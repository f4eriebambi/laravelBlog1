<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\FragranceNote;
// use App\Models\PerfumeRecommendation;
// use App\Models\UserBlend;
use Illuminate\Support\Facades\Auth;

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
        return view('perfume-mixer', compact('notes'));
    }

    /**
     * Handle the mixing process and recommend a perfume.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function mix(Request $request)
    {
        // Get the selected notes from the request
        $selectedNotes = $request->notes; // e.g., ["Rose", "Bergamot", "Vanilla"]
        $recommendedPerfume = null;

        // Try to find a perfect match
        $recommendedPerfume = PerfumeRecommendation::where('notes', 'like', "%{$selectedNotes[0]}%")
            ->where('notes', 'like', "%{$selectedNotes[1]}%")
            ->where('notes', 'like', "%{$selectedNotes[2]}%")
            ->first();

        // If no perfect match, find the closest match
        if (!$recommendedPerfume) {
            $recommendedPerfume = PerfumeRecommendation::where(function ($query) use ($selectedNotes) {
                foreach ($selectedNotes as $note) {
                    $query->orWhere('notes', 'like', "%{$note}%");
                }
            })->orderByRaw(
                "CASE
                    WHEN notes LIKE '%{$selectedNotes[0]}%' THEN 1 ELSE 0 END +
                CASE
                    WHEN notes LIKE '%{$selectedNotes[1]}%' THEN 1 ELSE 0 END +
                CASE
                    WHEN notes LIKE '%{$selectedNotes[2]}%' THEN 1 ELSE 0 END"
            , 'DESC')->first();
        }

        // If still no match, generate a custom blend
        if (!$recommendedPerfume) {
            return response()->json([
                'custom' => true,
                'name' => $this->generatePerfumeName($selectedNotes),
                'notes' => implode(', ', $selectedNotes),
            ]);
        }

        // Return the recommended perfume details
        return response()->json([
            'image' => $recommendedPerfume->image,
            'buy_link' => $recommendedPerfume->buy_link,
            'name' => $recommendedPerfume->name,
            'description' => $recommendedPerfume->description,
        ]);
    }

    /**
     * Save the user's blend to their profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to save blends.');
        }

        // Create a new user blend
        $blend = new UserBlend();
        $blend->user_id = Auth::id();
        $blend->notes = $request->notes;
        $blend->perfume_name = $request->perfume_name;
        $blend->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Blend saved to your Fragrance Wardrobe!');
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
}
