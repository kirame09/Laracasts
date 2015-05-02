<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    /**
     * Constructor with middleware
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
	}

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        // $article = Article::findOrFail($id); // Without Binding - Method should have $id param

        return view('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /*
    public function store(Request $request)
    {
        // Another Way to Validate
        $this->validate($request, ['title' => 'required']);
        Article::create($request->all());
    }
     */
    public function store(ArticleRequest $request)
    {
        // Article::create($request->all()); // For without Auth

        /*
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);
        */

        $this->createArticle($request);

        // session()->flash('flash_message', 'Article Created');
        // flash()->success('Article Created');
        flash()->overlay('Article Created', 'Good Job!');

        return redirect('articles');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {
        // $article = Article::findOrFail($id); // Without Binding - Method should have $id param
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id); // Without Binding - Method should have $id param

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');

    }

    /**
     * @param Article $article
     * @param array   $tags
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
