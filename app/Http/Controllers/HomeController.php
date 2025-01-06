<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jcobhams\NewsApi\NewsApi;


class HomeController extends Controller
{
    public function __invoke()
    {
        $apiKey = '73be0d2fa9934fa68f79776a011ff01a';
        $query = 'Кыргызстан';
        $language = 'ru';
        $pageSize = 9;
        $url = "https://newsapi.org/v2/everything?q={$query}&language={$language}&pageSize={$pageSize}&apiKey={$apiKey}";
        
        try {
            $response = Http::get($url);
            $newsData = $response->json();

            if ($response->ok() && isset($newsData['status']) && $newsData['status'] === 'ok') {
                // Фильтруем статьи, исключая новости от `news.mail.ru`
                $filteredArticles = array_filter($newsData['articles'], function($article) {
                    return strpos($article['source']['name'], 'news.mail.ru') === false;
                });

                return view('home', ['articles' => array_values($filteredArticles)]);
            } else {
                return 'Ошибка при получении новостей: ' . ($newsData['message'] ?? 'Неизвестная ошибка.');
            }
        } catch (Exception $e) {
            return 'Ошибка при выполнении запроса: ' . $e->getMessage();
        }

    }
}
