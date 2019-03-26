<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use Illuminate\Support\ServiceProvider;


class comments extends Controller
{
    function index(){
      $comments=Comment::all();
	     return Response::json($comments,200);
    }

public function store()
{
	$comment=new Comment;
	$comment->author=Input::get('author');
	$comment->text=Input::get('text');
	$success=$comment->save();

	if(!$success)
	{
       	     return Response::json("error saving",500);
	}

        return Response::json("success",201);
}
public function show($id)
{
	$comment=Comment::find($id);
	if(is_null($comment))
	{
	     return Response::json("not found",404);
	}

	return Response::json($comment,200);
}
public function update($id)
{
	$comment=Comment::find($id);

	if(!is_null(Input::get('author')))
	{
		$comment->author=Input::get('author');
	}

	if(!is_null(Input::get('text')))
	{
		$comment->text=Input::get('text');
	}

	$success=$comment->save();

	if(!$success)
	{
		return Response::json("error updating",500);
	}

	return Response::json("success",201);
}
public function destroy($id)
{
	$comment=Comment::find($id);
	if(is_null($comment))
	{
		return Response::json("not found",404);
	}

	$success=$comment->delete();

	if(!$success)
	{
		return Response::json("error deleting",500);
	}

	return Response::json("success",200);
}
}
