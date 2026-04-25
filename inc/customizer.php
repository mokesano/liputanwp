<?php 

function addCustomize($wp_customize) {
	$wp_customize->add_panel( 'ThemesappPos', array(
	  'title' => 'Themesapp',
	  'priority' => 162,
	));

		// Warna =========================================================== 
		$wp_customize->add_section( 'color', array(
	    	'title' => 'Warna Situs',
		  	'description'=> 'Warna-warna yang ada dibawah ini adalah warna umum yang digunakan pada tema. Ubah warna-warna tersebut sesuai dengan selera dan keinginan anda.',
			'panel' => 'ThemesappPos',
	    ));
	    $wp_customize->add_setting( 'color1' , array(
	        'default'     => "#FF5722",
	        'transport'   => 'refresh',
	    ));
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color1', array(
	        'label'        => 'Warna 1',
	        'section'    => 'color',
	    )));
	    $wp_customize->add_setting( 'color2' , array(
	        'default'     => "#ff6600",
	        'transport'   => 'refresh',
	    ));
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color2', array(
	        'label'        => 'Warna 2',
	        'section'    => 'color',
	    )));
	    $wp_customize->add_setting( 'color3' , array(
	        'default'     => "#ff3300",
	        'transport'   => 'refresh',
	    ));
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color3', array(
	        'label'        => 'Warna 3',
	        'section'    => 'color',
	    )));

		
		/* UNGGULAN */
		$wp_customize->add_section( 'featuredimage' , array(
		  'title'      => 'Gambar Unggulan', 
		  'panel' => 'ThemesappPos',
		  'description'=> 'Berikut ini adalah pengaturan gambar unggulan pada halaman pos dan page',
		));
		$wp_customize->add_setting( 'featuredimageactivepos' , array(
			'default'    => false,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('featuredimageactivepos' , array(
			'section' => 'featuredimage',
			'label' =>'Tampilkan gambar unggulan dihalaman pos',
			'type'=>'checkbox',
		));

		$wp_customize->add_setting( 'featuredimageactivepage' , array(
			'default'    => false,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('featuredimageactivepage' , array(
			'section' => 'featuredimage',
			'label' =>'Tampilkan gambar unggulan dihalaman laman',
			'type'=>'checkbox',
		));
		$wp_customize->add_setting( 'categoryfeaturedimagea' , array(
			'default'    => '',
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('categoryfeaturedimagea' , array(
			'section' => 'featuredimage',
			'label' =>'Daftar kategori tanpa gambar unggulan',
			'type'=>'text',
		));

		/* REDAKSI */
		$wp_customize->add_section( 'timredaksi' , array(
		  'title'      => 'Tim Redaksi',     
		  'panel' => 'ThemesappPos',
		  'description'=> 'Berikut ini adalah pengaturan tampilan untuk tim redaksi yang terdiri dari pengaturan penulis, editor, dan reporter',
		));

		$wp_customize->add_setting( 'timredaksiactive' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('timredaksiactive' , array(
			'label' => 'Tampilkan tim redaksi',
			'section' => 'timredaksi',
			'type'=>'checkbox',
		));
		$wp_customize->add_setting( 'tombolredaksititle' , array(
			'default'    => 'Tim Redaksi',
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolredaksititle' , array(
			'section' => 'timredaksi',
			'label' =>'Judul Tombol',
			'type'=>'text',
		));
		$wp_customize->add_setting( 'timredaksipenulis' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('timredaksipenulis' , array(
			'label' => 'Tampilkan penulis',
			'section' => 'timredaksi',
			'type'=>'checkbox',
		));

		$wp_customize->add_setting( 'timredaksieditor' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('timredaksieditor' , array(
			'label' => 'Tampilkan editor',
			'section' => 'timredaksi',
			'type'=>'checkbox',
		));
		$wp_customize->add_setting( 'timredaksireporter' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('timredaksireporter' , array(
			'label' => 'Tampilkan reporter',
			'section' => 'timredaksi',
			'type'=>'checkbox',
		));

			
		/* SHARE */
		$wp_customize->add_section( 'tombolbagikan' , array(
		  'title'      => 'Tombol Bagikan',     
		  'panel' => 'ThemesappPos',
		  'description'=> 'Berikut ini adalah pengaturan tampilan untuk popup tombol share. Disini kamu bisa mengatur tombol mana yang ingin kamu aktifkan',
		));
		$wp_customize->add_setting( 'tombolsharetitle' , array(
			'default'    => 'Bagikan',
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolsharetitle' , array(
			'section' => 'tombolbagikan',
			'label' =>'Judul Tombol',
			'type'=>'text',
		));
		$wp_customize->add_setting( 'tombolwhatsapp' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolwhatsapp' , array(
			'label' => 'Whatsapp',
			'section' => 'tombolbagikan',
			'type'=>'checkbox',
		));
		$wp_customize->add_setting( 'tombolfacebook' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolfacebook' , array(
			'label' => 'Facebook',
			'section' => 'tombolbagikan',
			'type'=>'checkbox',
		));
		$wp_customize->add_setting( 'tomboltwitter' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tomboltwitter' , array(
			'label' => 'Twitter',
			'section' => 'tombolbagikan',
			'type'=>'checkbox',
		));

		$wp_customize->add_setting( 'tombolemail' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolemail' , array(
			'label' => 'Email',
			'section' => 'tombolbagikan',
			'type'=>'checkbox',
		));

		$wp_customize->add_setting( 'tombolcopylink' , array(
			'default'    => true,
			'transport'  =>  'refresh'
		));
		$wp_customize->add_control('tombolcopylink' , array(
			'label' => 'Copylink',
			'section' => 'tombolbagikan',
			'type'=>'checkbox',
		));

		$wp_customize->add_section( 'licPost' , array(
		  'title'      => 'Lisensi',     
		  'description'=> '',
		  'panel' => 'ThemesappPos',
		));

		$wp_customize->add_setting( 'lic' , array(
			'default'    => '',
			'transport'  =>  'postMessage'
		));
		$wp_customize->add_control('lic' , array(
			'section' => 'licPost',
			'label' =>'Lisensi Tema',
			'type'=>'text',
			'input_attrs' => array(
            'placeholder' => __( 'Masukan lisensi tema disini'),
        )
		));
			

}
add_action( 'customize_register', 'addCustomize' );

?>