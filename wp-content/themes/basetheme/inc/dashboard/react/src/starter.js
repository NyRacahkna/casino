/**
 * Activate a plugin
 *
 * @return void
 */
function wp_starter_activatePlugin() {
	var data = new FormData();
	data.append( 'action', 'thebase_install_starter' );
	data.append( 'security', thebaseDashboardParams.ajax_nonce );
	data.append( 'status', thebaseDashboardParams.status );
	jQuery.ajax({
		method:      'POST',
		url:         thebaseDashboardParams.ajax_url,
		data:        data,
		contentType: false,
		processData: false,
	})
	.done( function( response, status, stately ) {
		if ( response.success ) {
			location.replace( thebaseDashboardParams.starterURL );
		}
	})
	.fail( function( error ) {
		console.log( error );
	});
}
/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
import { useState, useEffect, Fragment } from '@wordpress/element';
const { withFilters, TabPanel, Panel, PanelBody, PanelRow, Button, Spinner } = wp.components;
export const StarterTab = () => {
	const [ working, setWorking ] = useState( null );
	const handleClick = () => {
		setWorking( true );
		wp_starter_activatePlugin();
	};
	return (
		<Fragment>
			<div className="thebase-desk-starter-inner" style={{ margin: '20px auto', textAlign:'center' }}>
				<h2>{ __( 'Starter Templates', 'basetheme' ) }</h2>
				<p>{ __( 'Create and customize professionally designed websites in minutes. Simply choose your template, choose your colors, and import. Done!', 'basetheme' ) }</p>
				<div className="image-container">
					<img width="772" height="250" alt={ __( 'Starter Templates', 'basetheme' ) } src={ thebaseDashboardParams.starterImage } />
				</div>
				{ thebaseDashboardParams.starterTemplates && (
					<a
						className="tb-action-starter thebase-desk-button"
						href={ thebaseDashboardParams.starterURL }
					>
						{ thebaseDashboardParams.starterLabel }
					</a>
				) }
				{ ! thebaseDashboardParams.starterTemplates && (
					<Button 
						className="tb-action-starter thebase-desk-button"
						onClick={ () => handleClick() }
					>
						{ thebaseDashboardParams.starterLabel }
						{ working && (
							<Spinner />
						) }
					</Button>

				) }
			</div>
		</Fragment>
	);
};

export default withFilters( 'thebase_theme_starters' )( StarterTab );