<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $contacts = [
        [
            "name" => "Wonde",
            "propic" => 'profile-picture.jpeg',
            'date_of_birth' => 18987676,
            'company' => 'ETDU',
            'role' => 'Programmer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequatur qui aspernatur praesentium asperiores voluptatem labore quos atque vero voluptatibus distinctio cum unde ullam aperiam aut, modi eos ducimus illum!'
        ],
        [
            "name" => "Belete",
            "propic" => 'pr1.jpg',
            'date_of_birth' => 19675463,
            'company' => 'ETDU',
            'role' => 'Junior Programmer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequatur qui aspernatur praesentium asperiores voluptatem labore quos atque vero voluptatibus distinctio cum unde ullam aperiam aut, modi eos ducimus illum!'
        ],
        [
            "name" => "Ahmed",
            "propic" => 'team-image-2.jpeg',
            'date_of_birth' => 17895478,
            'company' => 'ETDU',
            'role' => 'Data Analyst',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequatur qui aspernatur praesentium asperiores voluptatem labore quos atque vero voluptatibus distinctio cum unde ullam aperiam aut, modi eos ducimus illum!'
        ]
    ];
    public function about()
    {
        $title = "About Us - Online Store";
        $subtitle = "About Us Page";
        $description = "This is an about page...";
        $author = "Developed By: Wonde Tom";
        $description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequatur qui aspernatur praesentium asperiores voluptatem labore quos atque vero voluptatibus distinctio cum unde ullam aperiam aut, modi eos ducimus illum!';

        return view('home.about')
            ->with('title', $title)
            ->with('subtitle', $subtitle)
            ->with('description', $description)
            ->with('author', $author);
    }

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }

    public function employyes_list()
    {
        return view('home.employeesList')->with('contacts', $this->contacts);
    }

    public function addNewMenu()
    {
        return view('home.testMenu');
    }

    public function select(){
        $records = DB::select('select * from posts');
        return view('home.posts')->with('contacts', $records);
    }

    public function insert()
    {
        DB::insert('insert into posts(title,body,created_by,sig_data) values(?,?,?,?)', [
            'Senior Programmer',
            'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam dolor maxime ipsa atque voluptatem est, ut ad quae aliquam odit error, repellat nam inventore veritatis excepturi fuga reiciendis in nobis!',
            3,
            md5(serialize((object)[
                'Senior Programmer',
                'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam dolor maxime ipsa atque voluptatem est, ut ad quae aliquam odit error, repellat nam inventore veritatis excepturi fuga reiciendis in nobis!',
                3
            ])),
        ]);
    }

    public function update(){
        $sig_data = md5(serialize((object)[
            'Web Developer',
            'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam dolor maxime ipsa atque voluptatem est, ut ad quae aliquam odit error, repellat nam inventore veritatis excepturi fuga reiciendis in nobis!',
            3
        ]));
        DB::update('update posts set sig_data="'.$sig_data.'" where title="Web Developer"');
    }
}
