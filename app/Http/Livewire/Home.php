<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'featured_posts' => \App\Models\Post::with('category')->isPublished()->latest('published_at')->take(3)->get(),
            'general_posts' => \App\Models\Post::with('category')->isPublished()->latest('published_at')->skip(3)->take(4)->get(),
        ]);
    }
}
