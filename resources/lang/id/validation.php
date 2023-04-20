<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus menjadi tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => ':attribute mungkin hanya berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, dan tanda hubung.',
    'alpha_num'            => ':attribute mungkin hanya berisi huruf dan angka.',
    'array'                => ':attribute harus berupa array.',
    'before'               => ':attribute harus ada tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file'    => ':attribute harus antara :min dan :max kilobytes.',
        'string'  => ':attribute harus antara :min dan :max characters.',
        'array'   => ':attribute harus antara :min dan :max items.',
    ],
    'boolean'              => ':attribute field harus menggunakan true atau false.',
    'confirmed'            => ':attribute konfirmasi tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus :digits digit.',
    'digits_between'       => ':attribute harus antara :min dan :max digit.',
    'dimensions'           => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => ':attribute field memiliki nilai duplikat.',
    'email'                => ':attribute Harus alamat e-mail yang valid.',
    'exists'               => 'pilihan :attribute tidak valid.',
    'file'                 => ':attribute harus berupa file.',
    'filled'               => ':attribute harus memiliki nilai.',
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => 'pilihan :attribute tidak valid.',
    'in_array'             => ':attribute tidak ada di :other.',
    'integer'              => ':attribute harus berupa bilangan bulat.',
    'ip'                   => ':attribute harus alamat IP yang valid.',
    'ipv4'                 => ':attribute harus alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa string JSON yang valid.',
    'max'                  => [
        'numeric' => ':attribute mungkin tidak lebih besar dari :max.',
        'file'    => ':attribute mungkin tidak lebih besar dari :max kilobytes.',
        'string'  => ':attribute mungkin tidak lebih besar dari :max karakter.',
        'array'   => ':attribute mungkin tidak lebih dari :max item.',
    ],
    'mimes'                => ':attribute harus menjadi file type: :values.',
    'mimetypes'            => ':attribute harus menjadi file type: :values.',
    'min'                  => [
        'numeric' => ':attribute harus setidaknya :min.',
        'file'    => ':attribute harus setidaknya :min kilobytes.',
        'string'  => ':attribute harus setidaknya :min karakter.',
        'array'   => ':attribute setidaknya harus ada :min item.',
    ],
    'not_in'               => 'selected :attribute is invalid.',
    'numeric'              => ':attribute harus berupa nomor.',
    'present'              => ':attribute field must be present.',
    'regex'                => ':attribute format tidak valid.',
    'required'             => ':attribute harus diisi.',
    'required_if'          => ':attribute diperlukan ketika :other adalah :value.',
    'required_unless'      => ':attribute diperlukan kecuali :other ada di dalam :values.',
    'required_with'        => ':attribute diperlukan ketika :values adalah present.',
    'required_with_all'    => ':attribute diperlukan ketika :values adalah present.',
    'required_without'     => ':attribute diperlukan ketika :values tidak ada present.',
    'required_without_all' => ':attribute diperlukan bila tidak ada :values are present.',
    'same'                 => ':attribute dan :other harus cocok.',
    'size'                 => [
        'numeric' => ':attribute harus :size.',
        'file'    => ':attribute harus :size kilobytes.',
        'string'  => ':attribute harus :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus menjadi zona yang valid.',
    'unique'               => ':attribute sudah ada.',
    'uploaded'             => ':attribute gagal diunggah.',
    'url'                  => ':attribute format tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
