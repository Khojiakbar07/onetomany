<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $user = User::findOrFail(1);

    // $post = new Post(['title' => 'My first post with Edwin', 'body'=>'Laravel is Php framework']);

    $user->posts()->save(new Post(['title' => 'My first post with Edwin', 'body'=>'Laravel is Php framework']));
    
});

Route::get('/read', function() {
    $user = User::findOrFail(1);

    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});

Route::get('/update', function() {
    $user = User::findOrFail(1);

    $user->posts()->where('id','=',2)->update(['title' => 'Portfoliom 2','body'=>'My name is Hojiakbar Zokirov and I`m Fullstack developer']);
});



Route::get('/delete', function() {
    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->delete();

    return "done";
});
