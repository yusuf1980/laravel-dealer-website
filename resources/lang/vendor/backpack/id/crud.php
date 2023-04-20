<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Simpan dan item baru',
    'save_action_save_and_edit' => 'Simpan dan edit item ini',
    'save_action_save_and_back' => 'Simpan dan kembali',
    'save_action_changed_notification' => 'Default behaviour after saving has been changed.',

    // Create form
    'add'                 => 'Tambah',
    'back_to_all'         => 'Kembali ke semua ',
    'cancel'              => 'Batal',
    'add_a_new'           => 'Tambah baru ',

    // Edit form
    'edit'                 => 'Edit',
    'save'                 => 'Simpan',

    // Revisions
    'revisions'            => 'Revisi',
    'no_revisions'         => 'Tidak ditemukan revisi',
    'created_this'         => 'buat ini',
    'changed_the'          => 'ganti',
    'restore_this_value'   => 'Kembalikan nilai ini',
    'from'                 => 'dari',
    'to'                   => 'ke',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revisi berhasil dipulihkan',
    'guest_user'           => 'Pengguna tamu',

    // Translatable models
    'edit_translations' => 'EDIT TRANSLATIONS',
    'language'          => 'Bahasa',

    // CRUD table view
    'all'                       => 'Semua ',
    'in_the_database'           => 'dalam database',
    'list'                      => 'Daftar',
    'actions'                   => 'Aksi',
    'preview'                   => 'Preview',
    'delete'                    => 'Hapus',
    'admin'                     => 'Admin',
    'details_row'               => 'Ini adalah baris rinciannya. Ubahlah sesukamu.',
    'details_row_loading_error' => 'Terjadi kesalahan saat memuat detail. Silakan coba lagi.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Yakin ingin menghapus item ini?',
        'delete_confirmation_title'                   => 'Item Dihapus',
        'delete_confirmation_message'                 => 'Item telah berhasil dihapus.',
        'delete_confirmation_not_title'               => 'TIDAK dihapus',
        'delete_confirmation_not_message'             => "Terjadi kesalahan. Item Anda mungkin belum dihapus.",
        'delete_confirmation_not_deleted_title'       => 'Tidak dihapus',
        'delete_confirmation_not_deleted_message'     => 'Tidak ada yang terjadi. Item anda aman.',

        // DataTables translation
        'emptyTable'     => 'Tak ada data yang tersedia pada tabel ini',
        'info'           => 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
        'infoEmpty'      => 'Menampilkan 0 sampai 0 dari 0 entri',
        'infoFiltered'   => '(disaring dari _MAX_ total entri)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ catatan per halaman',
        'loadingRecords' => 'Loading...',
        'processing'     => 'Proses...',
        'search'         => 'Cari: ',
        'zeroRecords'    => 'Tidak ada catatan yang cocok ditemukan',
        'paginate'       => [
            'first'    => 'Pertama',
            'last'     => 'Terakhir',
            'next'     => 'Selanjutnya',
            'previous' => 'Sebelumnya',
        ],
        'aria' => [
            'sortAscending'  => ': aktifkan untuk mengurutkan kolom ascending',
            'sortDescending' => ': aktifkan untuk mengurutkan kolom yang descending',
        ],
        'export' => [
            'copy'              => 'Copy',
            'excel'             => 'Excel',
            'csv'               => 'CSV',
            'pdf'               => 'PDF',
            'print'             => 'Print',
            'column_visibility' => 'Visibilitas kolom',
        ],

    // global crud - errors
        'unauthorized_access' => 'Unauthorized access - Anda tidak memiliki izin yang diperlukan untuk melihat halaman ini.',
        'please_fix' => 'Mohon perbaiki kesalahan berikut:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Item telah berhasil ditambahkan.',
        'update_success' => 'Item telah berhasil diubah.',

    // CRUD reorder view
        'reorder'                      => 'Susun ulang',
        'reorder_text'                 => 'Gunakan drag&drop untuk menyusun ulang.',
        'reorder_success_title'        => 'Selesai',
        'reorder_success_message'      => 'Susunan Anda telah disimpan.',
        'reorder_error_title'          => 'Error',
        'reorder_error_message'        => 'Pesanan Anda belum disimpan.',

    // CRUD yes/no
        'yes' => 'Iya',
        'no' => 'Tidak',

    // CRUD filters navbar view
        'filters' => 'Filters',
        'toggle_filters' => 'Toggle filters',
        'remove_filters' => 'Remove filters',

    // Fields
        'browse_uploads' => 'Jelajahi upload',
        'clear' => 'Bersih',
        'page_link' => 'Link halaman',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'Internal link',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'External link',
        'choose_file' => 'Choose file',

    //Table field
        'table_cant_add' => 'Tidak bisa menambahkan yang baru :entity',
        'table_max_reached' => 'Jumlah maksimum :max tercapai',

    // File manager
    'file_manager' => 'File Manager',
];
