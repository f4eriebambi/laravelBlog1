<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FragranceNote;
use App\Models\PerfumeRecommendation;
use App\Models\UserBlend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PerfumeMixerController extends Controller
{
    /**
     * Display the perfume mixer page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all fragrance notes with their categories
        $notes = FragranceNote::with('category')->get();

        // Pass the notes to the view
        return view('special-feature.perfume-mixer', compact('notes'));
    }

    /**
     * Handle the mixing process and recommend a perfume.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    /**
 * Handle the mixing process and recommend a perfume.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */
public function mix(Request $request)
{
    try {
        // Get the selected notes from the request
        $selectedNotes = $request->notes;
        $recommendedPerfume = null;

        // Log the selected notes for debugging
        Log::info('Selected Notes:', $selectedNotes);

        // Check if all selected notes are the same
        $uniqueNotes = array_unique($selectedNotes);
        if (count($uniqueNotes) === 1) {
            // All notes are the same, try to find a perfume with exactly this note
            $singleNote = $selectedNotes[0];
            $recommendedPerfume = PerfumeRecommendation::whereRaw('LOWER(notes) = LOWER(?)', [$singleNote])->first();
            
            // If no exact match for this single note, go straight to custom blend
            if (!$recommendedPerfume) {
                Log::info('All notes are the same but no exact match found. Generating Custom Blend.');
                return response()->json([
                    'custom' => true,
                    'name' => $this->generatePerfumeName($selectedNotes),
                    'notes' => implode(', ', $selectedNotes),
                ]);
            }
        } else {
            // Regular case - try to find a perfect match with all selected notes
            $recommendedPerfume = PerfumeRecommendation::where('notes', 'like', "%{$selectedNotes[0]}%")
                ->where('notes', 'like', "%{$selectedNotes[1]}%")
                ->where('notes', 'like', "%{$selectedNotes[2]}%")
                ->first();
        }

        // Log the perfect match result
        Log::info('Perfect Match:', [$recommendedPerfume]);

        // If no perfect match, find the closest match
        $partialMatch = false;
        if (!$recommendedPerfume) {
            $query = PerfumeRecommendation::query();
            foreach ($selectedNotes as $note) {
                $query->orWhere('notes', 'like', "%$note%");
            }

            // Build the order by clause dynamically
            $orderByClause = implode(' + ', array_map(function ($note) {
                return "CASE WHEN notes LIKE '%$note%' THEN 1 ELSE 0 END";
            }, $selectedNotes));

            $recommendedPerfume = $query->orderByRaw($orderByClause . ' DESC')->first();
            $partialMatch = true; // Set partial match flag

            // Log the closest match result
            Log::info('Closest Match:', [$recommendedPerfume]);
        }

        // If still no match, generate a custom blend
        if (!$recommendedPerfume) {
            Log::info('No Match Found. Generating Custom Blend.');
            return response()->json([
                'custom' => true,
                'name' => $this->generatePerfumeName($selectedNotes),
                'notes' => implode(', ', $selectedNotes),
            ]);
        }

        // Return the recommended perfume details
        Log::info('Recommended Perfume:', [$recommendedPerfume]);
        return response()->json([
            'image' => $recommendedPerfume->image,
            'buy_link' => $recommendedPerfume->buy_link,
            'name' => $recommendedPerfume->name,
            'description' => $recommendedPerfume->description,
            'partial_match' => $partialMatch, // Add partial match flag
            'notes' => implode(', ', $selectedNotes), 
    'perfume_id' => $recommendedPerfume->id
        ]);
    } catch (\Exception $e) {
        // Log the error and return a user-friendly message
        Log::error('Error in PerfumeMixerController: ' . $e->getMessage());
        return response()->json([
            'error' => 'An error occurred while processing your request. Please try again.',
        ], 500);
    }
}

    /**
     * Generate a whimsical name for a custom blend.
     *
     * @param  array  $notes
     * @return string
     */
    private function generatePerfumeName($notes)
    {
        $adjectives = ['Celestial', 'Ethereal', 'Luminous', 'Secret', 'Twilight'];
        $nouns = ['Serenade', 'Whisper', 'Embrace', 'Mirage', 'Eclipse'];
        return $adjectives[array_rand($adjectives)] . ' ' . $nouns[array_rand($nouns)];
    }

    /**
     * Display saved fragrance blends.
     *
     * @return \Illuminate\View\View
     */
    public function wardrobe()
{
    $blends = UserBlend::with('recommendedPerfume')
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('special-feature.fragrance-wardrobe', compact('blends'));
}

    /**
     * Delete a saved fragrance blend.
     *
     * @param  \App\Models\UserBlend  $blend
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(UserBlend $blend)
{
    try {
        // Verify the blend belongs to the authenticated user
        if ($blend->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $blend->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Blend deleted successfully'
        ]);

    } catch (\Exception $e) {
        \Log::error('Delete failed:', [
            'error' => $e->getMessage(),
            'blend_id' => $blend->id
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Save a custom blend to the user's wardrobe.
 */
public function saveBlend(Request $request)
{
    $request->validate([
        'blend_name' => 'required|string',
        'blend_notes' => 'required|string',
        'colors' => 'required|string',
        'perfume_id' => 'nullable|integer'
    ]);

    try {
        // Check if user already has 6 blends
        $blendCount = UserBlend::where('user_id', auth()->id())->count();
        if ($blendCount >= 6) {
            return response()->json([
                'success' => false,
                'message' => 'limit_reached'
            ]);
        }

        UserBlend::create([
            'user_id' => auth()->id(),
            'notes' => $request->blend_notes,
            'perfume_name' => $request->blend_name,
            'recommended_perfume_id' => $request->perfume_id,
            'colors' => $request->colors,
            'created_at' => now()
        ]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        \Log::error('Save failed:', [
            'error' => $e->getMessage(),
            'data' => $request->all()
        ]);
        return response()->json(['success' => false], 500);
    }
}
}
