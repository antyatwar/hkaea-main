<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Exhibition extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    use WithPagination;

    public function updatingFrom()
    {
        $this->resetPage();
    }

    public function updatingTo()
    {
        $this->resetPage();
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\DatePicker::make('from')
                    ->label(__('From'))
                    ->maxDate(now())
                    ->format('Y-m-d')
                    ->displayFormat('Y/m/d')
                    ->default(now()->subYears(1))
                    ->reactive()
                    ->required(),
                Forms\Components\DatePicker::make('to')
                    ->label(__('To'))
                    ->maxDate(now())
                    ->format('Y-m-d')
                    ->displayFormat('Y/m/d')
                    ->default(now())
                    ->reactive()
                    ->required(),
            ]),
        ];
    }

    public function render(): View
    {
        return view('livewire.exhibition', [
            'posts' => \App\Models\Post::with('category')
                ->where('category_id', '3')
                ->isPublished()
                ->latest('published_at')
                ->publishedBetween($this->form->getState('from'), $this->form->getState('to'))
                ->simplePaginate(6),
            'photos' => \App\Models\Photo::with('category')
                ->where('category_id', '3')
                ->isPublished()
                ->latest('published_at')
                ->publishedBetween($this->form->getState('from'), $this->form->getState('to'))
                ->simplePaginate(8),
            'videos' => \App\Models\Video::with('category')
                ->where('category_id', '3')
                ->isPublished()
                ->latest('published_at')
                ->publishedBetween($this->form->getState('from'), $this->form->getState('to'))
                ->simplePaginate(6),
        ]);
    }
}
