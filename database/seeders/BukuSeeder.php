<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'nama_buku' => 'Belajar Laravel',
            'penulis' => 'John Doe',
            'tahun_rilis' => '2021',
            'ebook_path' => 'ebooks/belajar_laravel.pdf',
            'cover_path' => 'covers/belajar_laravel.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Mastering PHP',
            'penulis' => 'Jane Smith',
            'tahun_rilis' => '2020',
            'ebook_path' => 'ebooks/mastering_php.pdf',
            'cover_path' => 'covers/mastering_php.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'JavaScript for Beginners',
            'penulis' => 'Alice Johnson',
            'tahun_rilis' => '2019',
            'ebook_path' => 'ebooks/javascript_for_beginners.pdf',
            'cover_path' => 'covers/javascript_for_beginners.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Python Programming',
            'penulis' => 'Bob Brown',
            'tahun_rilis' => '2018',
            'ebook_path' => 'ebooks/python_programming.pdf',
            'cover_path' => 'covers/python_programming.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Java Fundamentals',
            'penulis' => 'Charlie Wilson',
            'tahun_rilis' => '2017',
            'ebook_path' => 'ebooks/java_fundamentals.pdf',
            'cover_path' => 'covers/java_fundamentals.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'C# Programming',
            'penulis' => 'David Lee',
            'tahun_rilis' => '2016',
            'ebook_path' => 'ebooks/csharp_programming.pdf',
            'cover_path' => 'covers/csharp_programming.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Ruby on Rails',
            'penulis' => 'Eva Green',
            'tahun_rilis' => '2015',
            'ebook_path' => 'ebooks/ruby_on_rails.pdf',
            'cover_path' => 'covers/ruby_on_rails.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Node.js Essentials',
            'penulis' => 'Frank White',
            'tahun_rilis' => '2014',
            'ebook_path' => 'ebooks/nodejs_essentials.pdf',
            'cover_path' => 'covers/nodejs_essentials.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'React Native Development',
            'penulis' => 'Grace Brown',
            'tahun_rilis' => '2013',
            'ebook_path' => 'ebooks/react_native_development.pdf',
            'cover_path' => 'covers/react_native_development.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Vue.js Handbook',
            'penulis' => 'Henry Johnson',
            'tahun_rilis' => '2012',
            'ebook_path' => 'ebooks/vuejs_handbook.pdf',
            'cover_path' => 'covers/vuejs_handbook.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Angular 9',
            'penulis' => 'Irene Wilson',
            'tahun_rilis' => '2011',
            'ebook_path' => 'ebooks/angular_9.pdf',
            'cover_path' => 'covers/angular_9.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Docker for Beginners',
            'penulis' => 'Jack Brown',
            'tahun_rilis' => '2010',
            'ebook_path' => 'ebooks/docker_for_beginners.pdf',
            'cover_path' => 'covers/docker_for_beginners.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'Kubernetes in Action',
            'penulis' => 'Katie Green',
            'tahun_rilis' => '2009',
            'ebook_path' => 'ebooks/kubernetes_in_action.pdf',
            'cover_path' => 'covers/kubernetes_in_action.jpg',
        ]);

        Buku::create([
            'nama_buku' => 'AWS Cloud Computing',
            'penulis' => 'Larry Wilson',
            'tahun_rilis' => '2008',
            'ebook_path' => 'ebooks/aws_cloud_computing.pdf',
            'cover_path' => 'covers/aws_cloud_computing.jpg',
        ]);
    }
}