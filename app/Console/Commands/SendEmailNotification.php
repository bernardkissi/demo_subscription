<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Notification;

class SendEmailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post notification to subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postId = $this->argument('post');
        
        $post = Post::firstWhere('id', $postId);
        $subscribers = $post->site->subscribers;
        
        if(!$post->is_dispatched) {
            Notification::send($subscribers, new PostNotification($post));
            $post->update(['is_dispatched' => true]);
        }
        
    }
}
