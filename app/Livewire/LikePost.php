<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $totalLikes;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike( Auth::user() );
        $this->totalLikes = $post->likes->count();

    }

    public function like()
    {
        if( $this->post->checkLike( Auth::user() ) ){
            
            $this->post->likes()->where('post_id' , $this->post->id )->delete();
            $this->isLiked = false;
            $this->totalLikes--;
            
        }else{

            $this->post->likes()->create([ 'user_id' => Auth::user()->id ]);
            $this->isLiked = true;
            $this->totalLikes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
