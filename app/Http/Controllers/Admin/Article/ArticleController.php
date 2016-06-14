<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service\Admin\ArticleService;

use App\Models\Article;

use App\Tool\MessageResult;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $article;
    public function __construct( ArticleService $article){
        $this->article = $article ;

    }

    public function index()
    {
        return view('Admin.Article.manageArticle');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createArticle()
    {

        $article = new Article();
        return view('Admin.Article.createArticle')->with('article',$article);
        //
    }

    public function classificationandtag()
    {
        $tagNameList = $this->article->getAllArticleTag();
        $categoryList = $this->article->getAllArticleCategory();

        $oneLevelCategoryList = $this->article->getOneLevelCategory();
       
        return view('Admin.Article.ClassificationAndTag')->with('tagNameList',$tagNameList)->with('categoryList',$categoryList)->with('oneLevelCategoryList',$oneLevelCategoryList);
    }

    public function addArticleTag(Request $request)
    {   
        $jsonResult = new MessageResult();

        $del = $this->article->addArticleTag($request->input('tag_name'));

        if ($del) {
            $jsonResult->statusCode = 1;
            $jsonResult->statusMsg = "成功";
            $jsonResult->tagName = $request->input('tag_name');
        }else{
            $jsonResult->statusCode = 0;
            $jsonResult->statusMsg = "失败";
        }

        return response($jsonResult->toJson());
    }

    public function delArticleTag(Request $request)
    {
        $jsonResult = new MessageResult();

        $addTag = $this->article->delArticleTag($request->input('tag_id'));

        if ($addTag) {
            $jsonResult->statusCode = 1;
            $jsonResult->statusMsg = "成功";
        }else{
            $jsonResult->statusCode = 0;
            $jsonResult->statusMsg = "失败";
        }

        return response($jsonResult->toJson());
    }

    public function classificationOperate(Request $request)
    {
        $jsonResult = new MessageResult();

        $createMenu = $this->article->classificationOperate($request->input());

        if ($createMenu) {
            $jsonResult->statusCode = 1;
            $jsonResult->statusMsg = "成功";
        }else{
            $jsonResult->statusCode = 0;
            $jsonResult->statusMsg = "失败";
        }

        return response($jsonResult->toJson());
    }

    public function delArticleCategory(Request $request)
    {
        $jsonResult = new MessageResult();

        $del = $this->article->delArticleCategory($request->input('categoryId'));

        if ($del) {
            $jsonResult->statusCode = 1;
            $jsonResult->statusMsg = "成功";
        }else{
            $jsonResult->statusCode = 0;
            $jsonResult->statusMsg = "失败";
        }

        return response($jsonResult->toJson());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHotel(Request $request)
    {

       // return view('Admin.Article.createArticle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}