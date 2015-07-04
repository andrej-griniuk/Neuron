<?php
namespace App\Controller;

use App\Model\Entity\Video;
use Lessons\Model\Entity\Lesson;

class IndexController extends AppController
{
    public function index()
    {
        $this->layout = 'index';
    }

}
