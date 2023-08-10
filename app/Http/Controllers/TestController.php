<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


/**
 * Just a test controller
 */
class TestController extends Controller
{
    /**
     * Function to test route grouping output
     * @return void
     */
    public function first(): void {
        echo "First";
    }

    public function second() {
        echo "Second";
    }

    public function httpClient() {
        $response = Http::asForm()->post('localhost/note/store', [
            'text' => 'with guzzle'
        ]);
    }

    public function bigCalculation(int $a, int $b): int{
        return $a + $b;
    }
}
