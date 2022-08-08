<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Auth;

use App\Http\Requests\StoreMessage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;

class ConversationsController extends Controller
{



    private $r;
    /**
     * @var AuthManager
     */
    private $auth;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->r = $conversationRepository;
        $this->auth = $auth;
        
    }
    
     




    public function index()
    {
        
        return view('conversations.index',[
            'users' => $this->r->getConversations($this->auth->user()->id)

        ]);
        
    }

    




    public function store(User $user, StoreMessage $request)
    {
       $this->r->createMessage(
        $request->get('content'),
        $this->auth->user()->id,
        $user->id
       );
       return redirect(route('conversations.show', ['user' => $user]));
    }





    public function show( User $user)
    {
        return view('conversations.show',[
            'users' => $this->r->getConversations($this->auth->user()->id),
            'user' => $user,
            'messages' => $this->r->getMessagesFor($this->auth->user()->id, $user->id)->paginate(4)
        ]);
    }

}
