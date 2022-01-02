<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagIndex extends Component
{
    public $showTagModal=false;

    public $tagName;
    public $tags=[];
    public $tagId;

    public function showCreateModal(){
        $this->showTagModal=True;
    }

    public function closeTagModal()
    {
        $this->showTagModal=false;
    }

    public function mount()
    {
        $this->tags=Tag::all();
    }

    public function createTag()
    {
        Tag::create([
            'tag_name'=>$this->tagName,
            'slug'=>Str::slug($this->tagName),
        ]);
        $this->reset();
        $this->tags=Tag::all();
        $this->dispatchBrowserEvent('banner-message', ['style'=>'success', 'message'=>'Tag created successfully']);

    }

    public function showEditModal($tagId)
    {
        $this->reset(['tagName']);
        $this->tagId=$tagId;
        $tag=Tag::find($tagId);
        $this->tagName=$tag->tag_name;
        $this->showTagModal=true;
    }

    public function updateTag()
    {
        $tag=Tag::findOrFail($this->tagId);
        $tag->update([
            'tag_name'=> $this->tagName,
            'slug' => Str::slug($this->tagName)
        ]);
        $this->reset();
        $this->tags=Tag::all();
        $this->showTagModal=false;
    }

    public function showDeleteModal($tagId)
    {
        $tag=Tag::findOrFail($tagId);
        $tag->delete();
        $this->reset();
        $this->tags=Tag::all();
        $this->dispatchBrowserEvent('banner-message', ['style'=>'danger', 'message'=>'Tag deleted successfully']);

    }

    public function render()
    {
        return view('livewire.tag-index');
    }
}
