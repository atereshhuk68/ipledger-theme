<?php
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'register_carbon_fields' );

function register_carbon_fields() {
	// Site header bg
	Container::make('theme_options', 'Site BG')
	->add_fields(array(
		Field::make( 'image', 'ipledger_video_mp4', 'MP4 BG' )
		->set_type(array('video'))
		->set_width(30),
		Field::make( 'image', 'ipledger_video_webm', 'WEBM BG' )
		->set_type(array('video'))
		->set_width(30),
		Field::make( 'image', 'ipledger_video_poster', 'Poster' )
		->set_type(array('image'))
		->set_width(30),
	));
	// Main page NFT slider
	Container::make('post_meta', 'NFT Slider')
	->where('post_template', '=', 'home.php')
	->add_fields(array(
		Field::make('media_gallery', 'nft_slides', 'Slides')
	));
	// Contacts
	Container::make( 'theme_options', 'Contacts')
	->add_fields( array(
			Field::make( 'text', 'ipledger_phone', 'Phone number' )
			->set_width(50),
			Field::make( 'text', 'ipledger_email', 'Email' )
			->set_width(50)
	) );
	// Services fields
	Container::make( 'post_meta', __( 'Additional data' ) )
	->where( 'post_type', '=', 'services' )
	->add_fields( array(
		Field::make("text", "services_short_name", "Short name")
			->help_text("Коротка назва, яка потрібна для головної сторінки")
			->set_required(true)
			->set_width(50),
		Field::make("select", "services_animated_icon", "Service icon")
			->help_text("Іконка, яка має анімацію на головній сторінці")
			->set_width(50)
			->set_options(array(
				"diploma" => "Trademark (Diploma)",
				"document" => "Patent (Document)",
				"lock" => "Digital rights protection (PC)",
				"user" => "GDPR (User)",
				"protection" => "Domain protection",
				"copy" => "Blockchain/NFT/IT development"
			))
	) );
	// Get a consultation
	Block::make(_('Primary button'))
	->add_fields( array(
		Field::make( 'text', 'button_text', 'Button text' )
		->set_default_value("Get a consultation"),
		Field::make( 'text', 'button_form_title', 'Form title')
		->set_default_value("Get a consultation"),
		Field::make( 'text', 'button_special_class', 'Special value')
		->help_text('Special class for form trigger'),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>
			<div class="button-wrap">
				<button class="button button--primary wp-block-button" data-openmodalform="<?php echo $fields['button_special_class']?>" data-formtitle="<?php echo esc_html( $fields['button_form_title'] ); ?>"><?php echo esc_html( $fields['button_text'] ); ?></button>
			</div>
	<? } );

	// Virtual Select Block
	Block::make(_('VS Input'))
	->add_fields( array(
		Field::make( 'text', 'vs_input_id', 'Input ID' )
		->help_text('Enter field id. Use lowercase and no spaces')
	) )
	->set_render_callback( function ( $fields ) { ?>
		<div id="<?php echo $fields["vs_input_id"]?>"></div>
	<? } );

	// Cards with propositions
	Block::make('Cards with propositions')
	->add_fields(array(
		Field::make('complex', 'cards_list', 'Single card with proposition')
		->add_fields(array(
			Field::make('text', 'card_proposition_name', 'Proposition name'),
			Field::make('text', 'card_proposition_price', 'Price')
			->help_text('Enter price or plan name. If price, don\' forget use currency'),
			Field::make('complex', 'card_proposition_list', 'List')
			->add_fields(array(
				Field::make('text', 'list_item', 'Item name')
				->help_text('Enter feature')
			))
			->help_text('List of features'),
			Field::make('text', 'card_proposition_button', 'Button text or shortcode')
			->help_text('Input button text or use WP Simple Pay shortcode, if you want paste payment button')
		))
	))
	->set_render_callback( function ($fields) { ?>
		<div id="trademarkslider" class="swiper proposition">
			<div class="swiper-wrapper">
				<?php foreach($fields['cards_list'] as $card) :?>
					<article class="proposition-card swiper-slide">
						<strong class="proposition-card__name"><?php echo $card['card_proposition_name']?></strong>
						<p class="proposition-card__plan"><?php echo $card['card_proposition_price']?></p>
						<ul class="proposition-card__list proposition-list special">
							<?php foreach($card['card_proposition_list'] as $listItem) :?>
								<li class="proposition-list__item"><?php echo $listItem['list_item']?></li>
							<?php endforeach; ?>
						</ul>
						<a href="#" class="button button--secondary proposition-card__button"><?php echo $card['card_proposition_button']?></a>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="swiper-pagination proposition-pagination"></div>
		</div>
	<? });

	// Radiobutton
	Block::make(_('Custom countries selection'))
	->add_fields( array(
		Field::make( 'text', 'country_selection_tab_label_1', 'Tab 1 label' )
		->set_default_value('Complex solution'),
		Field::make( 'text', 'country_selection_tab_label_2', 'Tab 2 label' )
		->set_default_value('Select countries from list'),
		Field::make( 'complex', 'country_selection_cards', __( 'Complex solution. Cards' ) )
    ->add_fields( array(
			Field::make( 'image', 'card_photo', __( 'Card icon or flag' ) ),
			Field::make( 'text', 'card_title', __( 'Card title' ) )
			->set_width(50),
			Field::make( 'text', 'card_label', __( 'Card label (shortname)' ) )
			->set_width(50),
			Field::make( 'text', 'card_description', __( 'Card description' ) ),
    ) ),
	) )
	->set_render_callback( function ( $fields ) { ?>
		<div id="country-selection" class="country-selection mt-3">
			<div class="country-selection__tabs mb-3">
				<label for="complex" class="tab-single is--checked label-wrap">
					<input type="radio" class="me-2" name="custom-solution" id="complex" value="complex" checked>
					<?php echo esc_html( $fields['country_selection_tab_label_1'] ); ?>
				</label>
				<label for="manually" class="tab-single label-wrap">
					<input type="radio" class="me-2" name="custom-solution" id="manually" value="manually">
					<?php echo esc_html( $fields['country_selection_tab_label_2'] ); ?>
				</label>
			</div>
			<div class="country-selection__blocks mb-5">
				<div class="country-selection__block block--grid" data-customselection="complex">
					<?php
						$cards = $fields['country_selection_cards'];
						foreach($cards as $card) { ?>
							<?php if (empty($card['card_description'])) { $class = 'is--centered'; }  ?>
							<label for="input-<?php echo $card['card_label']?>" class="label-wrap">
								<input type="radio" name="card-complex" id="input-<?php echo $card['card_label']?>" value="<?php echo $card['card_label']?>">
								<div class="card-complex d-flex flex-column <?php echo $class;?>">
									<?php echo get_image_tag($card['card_photo'], get_the_title() . ' flag', null, null, 'medium')?>
									<strong class="card-complex__title"><?php echo $card['card_title']?></strong>
									<p class="card-complex__desc"><?php echo $card['card_description']?></p>
								</div>
							</label>
					<? } ?>
				</div>
				<div class="country-selection__block is--hidden" data-customselection="manually">
					<div id="countries-list"></div>
				</div>
			</div>
		</div>
	<? } );

	// Secret key
	Container::make( 'theme_options', 'Captcha' )
    ->add_fields( array(
        Field::make( 'text', 'ipledger_captcha_secret_key', __( 'Secret captcha key' ) )
				->set_required( true )
    ) );
}


