<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public function __invoke()
    {
        $articles = Cache::remember('articles:all', now()->addHours(2), function () {
            $apiKey = env('NEWS_API_KEY');
            $query = env('NEWS_API_QUERY');
            $language = env('NEWS_API_LANG');
            $pageSize = env('NEWS_API_PAGES');
            $url = "https://newsapi.org/v2/everything?q={$query}&language={$language}&pageSize={$pageSize}&apiKey={$apiKey}";
    
            try {
                $response = Http::get($url);
                $newsData = $response->json();
    
                if ($response->ok() && isset($newsData['status']) && $newsData['status'] === 'ok') {
                    $filteredArticles = array_filter($newsData['articles'], function($article) {
                        return strpos($article['source']['name'], 'news.mail.ru') === false;
                    });
    
                    return $filteredArticles;
                } else {
                    return 'Ошибка при получении новостей: ' . ($newsData['message'] ?? 'Неизвестная ошибка.');
                }
            } catch (Exception $e) {
                return 'Ошибка при выполнении запроса: ' . $e->getMessage();
            }
        });

        return view('home', compact('articles'));

    }
}
