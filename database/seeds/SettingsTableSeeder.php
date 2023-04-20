<?php

//namespace Database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * The settings to add.
     */
    protected $settings = [
        [
            'key'           => 'contact_email',
            'name'          => 'Contact form email address',
            'description'   => 'Alamat email yang akan dikirim semua email dari formulir kontak.',
            'value'         => 'admin@admin.com',
            'field'         => '{"name":"value","label":"Value","type":"email"}',
            'active'        => 1,
        ],
        [
            'key'           => 'title_website',
            'name'          => 'Judul Website',
            'description'   => 'Judul Website (tampil pada mesin pencari (google).',
            'value'         => 'Honda Amartha Samarinda | Dealer Kalimantan Timur, cash & credit',
            'field'         => '{"name":"value","label":"Value", "title":"Title Website","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'slogan',
            'name'          => 'Slogan Website',
            'description'   => 'Slogan Website tampil di atas sebelah kiri website.',
            'value'         => 'Dealer Honda Amartha - The Power of Dream',
            'field'         => '{"name":"value","label":"Value", "title":"Slogan Website","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'keyword_website',
            'name'          => 'Keyword Website',
            'description'   => 'Kata kunci pencarian Website (tampil pada mesin pencari (google).',
            'value'         => 'honda, honda amartha, honda amartha samarinda, samarinda, kaltim, kalimantan tiur, cash, credit, kredit, mobil, mobil honda, dealer, dealer honda, dealer honda samarinda, tenggarong, bontang, sangatta',
            'field'         => '{"name":"value","label":"Value", "title":"Description Website","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'desc_website',
            'name'          => 'Description Website',
            'description'   => 'Description Website (tampil pada mesin pencari (google).',
            'value'         => 'Dealer Honda Amartha Samarinda. Temukan semua mobil Honda sesuai keinginan Anda di sini.',
            'field'         => '{"name":"value","label":"Value", "title":"Description Website","type":"textarea"}',
            'active'        => 1,
        ],
        [
            'key'           => 'author_website',
            'name'          => 'Author',
            'description'   => 'Author.',
            'value'         => 'Honda Amartha',
            'field'         => '{"name":"value","label":"Value", "title":"Title Website","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'logo_utama',
            'name'          => 'Logo Utama',
            'description'   => 'Logo Utama Website, sebaiknya lebar: 286px, tinggi: 60px).',
            'value'         => 'uploads/logo-honda-2.png',
            'field'         => '{"name":"value","label":"Value", "title":"Title Website","type":"browse"}',
            'active'        => 1,
        ],
        /*[
            'key'           => 'logo_small',
            'name'          => 'Logo Kecil',
            'description'   => 'Logo Kecil Website, sebaiknya lebar: 114, tinggi: 150, dan jenis .png transparan.',
            'value'         => 'uploads/logo-small.png',
            'field'         => '{"name":"value","label":"Value", "title":"Title Website","type":"browse"}',
            'active'        => 1,
        ],*/
        /*[
            'key'           => 'contact_cc',
            'name'          => 'Contact form CC field',
            'description'   => 'Email adresses separated by comma, to be included as CC in the email sent by the contact form.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,

        ],
        [
            'key'           => 'contact_bcc',
            'name'          => 'Contact form BCC field',
            'description'   => 'Email adresses separated by comma, to be included as BCC in the email sent by the contact form.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value","type":"email"}',
            'active'        => 1,

        ],
        [
            'key'           => 'motto',
            'name'          => 'Motto',
            'description'   => 'Website motto',
            'value'         => 'this is the value',
            'field'         => '{"name":"value","label":"Value", "title":"Motto value" ,"type":"textarea"}',
            'active'        => 1,
        ],*/
        
        [
            'key'           => 'twitter',
            'name'          => 'Twitter',
            'description'   => 'Link untuk twitter',
            'value'         => 'https://twitter.com',
            'field'         => '{"name":"value","label":"Value", "title":"Twitter value" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'facebook',
            'name'          => 'Facebook',
            'description'   => 'Link untuk Facebook',
            'value'         => 'https://facebook.com',
            'field'         => '{"name":"value","label":"Value", "title":"Facebook value" ,"type":"text"}',
            'active'        => 1,

        ],
        [
            'key'           => 'google_plus',
            'name'          => 'Google Plus',
            'description'   => 'Link untuk Google Plus',
            'value'         => 'https://plus.google.com/discover?hl=id',
            'field'         => '{"name":"value","label":"Value", "title":"Google value" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'youtube',
            'name'          => 'Youtube',
            'description'   => 'Link untuk Youtube',
            'value'         => 'https://www.youtube.com/',
            'field'         => '{"name":"value","label":"Value", "title":"Youtube value" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'google_analytic',
            'name'          => 'Google Analytic',
            'description'   => 'Script untuk Google Anaytic (opsional)',
            'value'         => 'this is the value',
            'field'         => '{"name":"value","label":"Value", "title":"Google Analytic value" ,"type":"textarea"}',
            'active'        => 1,
        ],
        [
            'key'           => 'copyright',
            'name'          => 'Copyright',
            'description'   => 'Copyright berada di bawah website',
            'value'         => '© 2017 Honda Amartha All Rights Reserved.',
            'field'         => '{"name":"value","label":"Value", "title":"Copyright value" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'max_slider',
            'name'          => 'Maksimal Slider',
            'description'   => 'Jumlah maksimal slider yang tampil di laman homepage',
            'value'         => 5,
            'field'         => '{"name":"value","label":"Value", "title":"Max value" ,"type":"number"}',
            'active'        => 1,
        ],
        [
            'key'           => 'max_sidebar_news',
            'name'          => 'Maksimal Berita Sidebar',
            'description'   => 'Jumlah maksimal berita yang tampil di sidebar news',
            'value'         => 10,
            'field'         => '{"name":"value","label":"Value", "title":"Max value" ,"type":"number"}',
            'active'        => 1,
        ],
        [
            'key'           => 'phone_marketing',
            'name'          => 'No Telp Marketing',
            'description'   => 'Nomor telepon marketing',
            'value'         => '',
            'field'         => '{ "name":"value", "label":"Value", "type":"table", "entity_singular":"nomor", "columns":{"phone":"Phone"}, "max":"3", "min":"0" }',
            'active'        => 1,
        ],
        [
            'key'           => 'operation_sales',
            'name'          => 'Jam Kerja Sales',
            'description'   => 'Jam kerja sales dari Senin sampai Minggu',
            'value'         => '',
            'field'         => '{ "name":"value", "label":"Value", "type":"table", "entity_singular":"hari", "columns":{"day":"Hari", "time":"Jam"}, "max":"7", "min":"0" }',
            'active'        => 1,
        ],
        [
            'key'           => 'operation_service',
            'name'          => 'Jam Kerja Service',
            'description'   => 'Jam kerja service dari Senin sampai Minggu',
            'value'         => '',
            'field'         => '{ "name":"value", "label":"Value", "type":"table", "entity_singular":"hari", "columns":{"day":"Hari", "time":"Jam"}, "max":"7", "min":"0" }',
            'active'        => 1,
        ],
        
        /*[
            'key'           => 'footer-column-1',
            'name'          => 'Gambar Kolom Footer 1',
            'description'   => 'Gambar dan lin Kolom Footer Pertama.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value", "title":"Kolom Footer 1","type":"textarea"}',
            'active'        => 1,
        ],
        [
            'key'           => 'footer-column-2',
            'name'          => 'Kolom Footer 2',
            'description'   => 'Pengaturan Kolom Footer Kedua.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value", "title":"Kolom Footer 2","type":"textarea"}',
            'active'        => 1,
        ],
        [
            'key'           => 'footer-column-3',
            'name'          => 'Kolom Footer 3',
            'description'   => 'Pengaturan Kolom Footer Ketiga.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value", "title":"Kolom Footer 2","type":"textarea"}',
            'active'        => 1,
        ],*/
        /* Footer Type */
        /*[
            'key'           => 'address',
            'name'          => 'Alamat (kolom 1)',
            'type'          => 'footer',
            'description'   => 'Alamat Kantor (nama jalan dan kota)',
            'value'         => 'Kabupaten Nunukan',
            'field'         => '{"name":"value","label":"Value", "title":"Alamat" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'province',
            'name'          => 'Provinsi (kolom 1)',
            'type'          => 'footer',
            'description'   => 'Provinsi',
            'value'         => 'Kalimantan Utara',
            'field'         => '{"name":"value","label":"Value", "title":"Provinsi" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'phone',
            'name'          => 'Telepon (kolom 1)',
            'type'          => 'footer',
            'description'   => 'Telepon kantor yang dapat dihubungi',
            'value'         => '(0556) 00000',
            'field'         => '{"name":"value","label":"Value", "title":"Telepon" ,"type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'map',
            'name'          => 'Peta Kantor (kolom 1)',
            'type'          => 'footer',
            'description'   => 'Embed Peta Kantor dari Google Maps',
            'value'         => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13386.107016076634!2d117.71382479200176!3d4.078670787802514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3215badf5ab8b037%3A0xceb2490a60532e7e!2sKantor+Bupati+Nunukan!5e0!3m2!1sid!2sid!4v1507964915121" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'field'         => '{"name":"value","label":"Value", "title":"Telepon" ,"type":"textarea"}',
            'active'        => 1,
        ],*/

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table('settings')->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
