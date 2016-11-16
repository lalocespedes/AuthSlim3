<?php
// Routes

$app->get('/', ['lalocespedes\Controllers\HomeController', 'index']);

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // $this->db->table('users')->insert([
//     //     'name' => 'lalocespedes',
//     //     'email' => 'lalocespedes@gmail.com',
//     //     'password' => '123'
//     //     ]);

//     // $this->db->table('users')->where('id', 2)->delete();

//     $users = $this->db->table('users')->get();

//     dump($users);

//     exit;

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });
