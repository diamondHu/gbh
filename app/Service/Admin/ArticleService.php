<?php

namespace App\Service\Admin;

use App\Models\ArticleTag;
use App\Models\ArticleCategory;

use App\Tool\MessageResult;

/**
* 
*/
class ArticleService {
	
	public function addArticleTag($TagName)
	{	
		$addTag = ArticleTag::insert([
			    'tag_name'=>$TagName
			]);

		return $addTag;
	}

	public function getAllArticleTag()
	{
		$ArticleTag = ArticleTag::select('id','tag_name')->orderBy('id','DESC')->get();

		return $ArticleTag;
	}

	public function getOneLevelCategory()
	{
		$ArticleCategory = ArticleCategory::where('parent_id',0)->select('id','category_name')->get();

		return $ArticleCategory;
	}

	public function delArticleTag($tagId)
	{
		return ArticleTag::where('id' , $tagId)->delete();
	}

	public function getAllArticleCategory()
	{
		$ArticleCategory = ArticleCategory::select('id','category_name','parent_id','created_at','updated_at','category_level','description')->get();

		foreach ($ArticleCategory as $articlecategory) {
			if ($articlecategory->parent_id == 0) {
				$articlecategory->levelName = "一级分类";
			}elseif($articlecategory->parent_id != 0){
				$articlecategory->levelName = ArticleCategory::where('id',$articlecategory->parent_id)->select('category_name')->first()->category_name;
			}
			
		}

		return $ArticleCategory;
	}

	public function classificationOperate($formData)
	{
		// dd($formData);

		$classificationName = $formData['classificationName'];
    	$parentId = $formData['parentId'];
    	$Description = $formData['Description'] == '' ? "未知" : $formData['Description'];

    	$EditOrAdd = $formData['EditOrAdd'];

    	if ($parentId == 0) {
    		$categoryLevel = 1;
    	}elseif ($parentId != 0) {
    		$categoryLevel = 2;
    	}

    	$classificationId = $formData['classificationId'];

    	$Operate = false;

    	if ($EditOrAdd == 'add' && $classificationId == 0) {
    		$Operate = ArticleCategory::insert([
			    'category_name'=>$classificationName,
			    'parent_id'=>$parentId,
			    'category_level'=>$categoryLevel,
			    'description'=>$Description
			]);
    	}elseif ($EditOrAdd == 'edit' && $classificationId != 0) {
    		$Operate = ArticleCategory::where('id',$classificationId)->update([
    			'category_name'=>$classificationName,
			    'parent_id'=>$parentId,
			    'category_level'=>$categoryLevel,
			    'description'=>$Description
			    ]);
    	}

    	return $Operate;

	}

	public function delArticleCategory($categoryId)
	{
		return ArticleCategory::where('id' , $categoryId)->delete();
	}


}



?>