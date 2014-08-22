<?php

/**
 * This is the model class for table "videos".
 *
 * The followings are the available columns in table 'videos':
 * @property integer $id
 * @property integer $subject_id
 * @property integer $category_id
 * @property string $name
 * @property string $key
 * @property string $filename
 * @property string $fileUrl
 * @property string $fileThumbnailUrl
 * @property string $description
 * @property integer $views
 * @property string $created_at
 * @property string $updated_at
 * @property string $embed_code
 * @property string $vimeo_embed_code
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $attorneys_id
 * @property string $tags
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Exams[] $exams
 * @property TblComment[] $tblComments
 * @property Terms[] $terms
 * @property UserWatchedVideo[] $userWatchedVideos
 * @property Attorneys $attorneys
 * @property Categories $category
 */
class Videos extends CActiveRecord
{

	const STATUS_DRAFT=1;
	const STATUS_PUBLISHED=2;
	const STATUS_ARCHIVED=3;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_at, updated_at', 'required'),
			array('subject_id, category_id, views, create_user_id, update_user_id, attorneys_id, status', 'numerical', 'integerOnly'=>true),
			array('name, key, filename, fileUrl, fileThumbnailUrl, embed_code, vimeo_embed_code', 'length', 'max'=>255),
			array('description, tags', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_id, category_id, name, key, filename, fileUrl, fileThumbnailUrl, description, views, created_at, updated_at, embed_code, vimeo_embed_code, create_user_id, update_user_id, attorneys_id, tags, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(		
			
			'userWatchedVideos' => array(self::HAS_MANY, 'UserWatchedVideo', 'video_id'),
			'lecturers' => array(self::BELONGS_TO, 'Lecturers', 'attorneys_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
			'author' => array(self::BELONGS_TO, 'User', 'author'),
			'comments' => array(self::HAS_MANY, 'Comment', 'video_id', 'condition'=>'comments.status='.Comment::STATUS_APPROVED, 'order'=>'comments.created_at DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'video_id', 'condition'=>'status='.Comment::STATUS_APPROVED),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject_id' => 'Subject',
			'category_id' => 'Category',
			'name' => 'Name',
			'key' => 'Key',
			'filename' => 'Filename',
			'fileUrl' => 'File Url',
			'fileThumbnailUrl' => 'File Thumbnail Url',
			'description' => 'Description',
			'views' => 'Views',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'embed_code' => 'Embed Code',
			'vimeo_embed_code' => 'Vimeo Embed Code',
			'create_user_id' => 'Create User',
			'update_user_id' => 'Update User',
			'attorneys_id' => 'Attorneys',
			'tags' => 'Tags',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
	
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('fileUrl',$this->fileUrl,true);
		$criteria->compare('fileThumbnailUrl',$this->fileThumbnailUrl,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('embed_code',$this->embed_code,true);
		$criteria->compare('vimeo_embed_code',$this->vimeo_embed_code,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('attorneys_id',$this->attorneys_id);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Videos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        
        public function getVideoInfo($video_id){          
            
           if (!empty($video_id)) {
               
           	    $vimeo = new phpVimeo('b7313730972c4f340aeb8c832bc0955cfcf5613b', '7cc1e66567417819efb1d170db4f906282e93da6', '60b72c5c916bea0524805af8ce19d382', '2f5bb2a125537db258ba62be03ba2447e53a5635');
				$vimeo->enableCache(phpVimeo::CACHE_FILE, './cache', 300);
	            $videos = $vimeo->call('vimeo.videos.getInfo', array('video_id' => $video_id));
	            
                
                foreach ($videos->video as $video) {
                  $data['id']=$video->id;
                  $data['is_hd']=$video->is_hd;
                  $data['is_transcoding']=$video->is_transcoding;
                  $data['license']=$video->license;
                  $data['privacy']=$video->privacy;                  
                  $data['title']=$video->title;
                  $data['description']=$video->description;
                  $data['upload_date']=$video->upload_date;
                  $data['modified_date']=$video->modified_date;
                  $data['number_of_plays']=$video->number_of_plays;
                  $data['number_of_likes']=$video->number_of_likes;
                  $data['number_of_likes']=$video->number_of_likes;
                  $data['width']=$video->width;
                  $data['height']=$video->height;
                  $data['duration']=videos::model()->formatDuration($video->duration);
                  $data['video_url']=$video->urls->url[0]->_content;
                  $data['mobile_url']=$video->urls->url[1]->_content;
                  $data['thumb_small']=$video->thumbnails->thumbnail[0]->_content;
                  $data['thumb_medium']=$video->thumbnails->thumbnail[1]->_content;
                  $data['thumb_large']=$video->thumbnails->thumbnail[2]->_content;
                  } // End foreach
                

               }  // if not empty

      else { 
      	  $data = false; 
       }
  
      return $data;
    // End Vimeo
 }
 
 
   public function formatDuration($seconds) {
       $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
} 


public function addComment($comment)
	{
		if(Yii::app()->params['commentNeedApproval'])
			$comment->status=Comment::STATUS_PENDING;
		else
			$comment->status=Comment::STATUS_APPROVED;
		$comment->video_id=$this->id;
		return $comment->save();
	}

}
