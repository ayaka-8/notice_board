<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeContact extends Model
{
    protected $guarded =array('id');
    
    /**
     * お問合わせのバリデーション
     */
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'subject.*' =>'in:現在の状況や課題の内容について,その他',
        'content' => 'required'
        );
    /**
     * セレクトボックスに表示するお問合わせ項目
     */
    public static $subjects =[
        '現在の状況や課題の内容について',
        'その他'
        ];
        
    /**
     * usersテーブルとリレーション
     */ 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * challenge_profilesテーブルとリレーション
     */ 
    public function challengeProfile()
    {
        return $this->belongsTo('App\ChallengeProfile');
    }
}
