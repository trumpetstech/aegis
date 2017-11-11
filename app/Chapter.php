<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use CrudTrait;

    protected $fillable = ['title', 'description', 'duration', 'date', 'begin_time', 'classroom_id'];


    public function messages()
    {
      return $this->hasOne(ChapterMessage::class);
    }

    public function homeworks()
    {
      return $this->hasMany(ChapterHomework::class);
    }

    public function notes()
    {
      return $this->hasOne(ChapterNote::class);
    }

    public function discussions()
    {
      return $this->hasMany(ChapterDiscussion::class);
    }

    public function classroom()
    {
    	return $this->belongsTo(Classroom::class);
    }

     public function enterSession($crud = false)
   	{ 
   	 
   	  
	  	return '<a class="btn btn-xs btn-success" target="_blank"  href="/classrooms/' . $this->classroom->id . '/chapter/' . $this->id . '" data-toggle="tooltip" title="Enter Chapter Session">Enter Session</a>';
   	   
   	}

   	public function getStatusText()
   	{
   		if($this->status == 0)
   		{
   			return 'Session not started';
   		} else if($this->status == 1)
   		{
   			return 'Session has started';
   		}else if($this->status == 2)
   		{
   			return 'Session completed';
   		}
   	}

   	public function getStatusButton()
   	{
   		if($this->status == 0)
   		{
   			return '<a class="btn btn-sm btn-primary" target="_blank"  href="/classrooms/' . $this->classroom->id . '/chapter/' . $this->id . '" data-toggle="tooltip" title="Enter Chapter Session">Notify Me</a>';
   		} else if($this->status == 1)
   		{
   			return '<a class="btn btn-sm btn-primary" target="_blank"  href="/classrooms/' . $this->classroom->id . '/chapter/' . $this->id . '" data-toggle="tooltip" title="Enter Chapter Session">Enter Session</a>';
   		} if($this->status == 2)
   		{
   			return '<a class="btn btn-sm btn-primary" target="_blank"  href="/classrooms/' . $this->classroom->id . '/chapter/' . $this->id . '" data-toggle="tooltip" title="Enter Chapter Session">Read Transcript</a>';
   		}
   	}
}
