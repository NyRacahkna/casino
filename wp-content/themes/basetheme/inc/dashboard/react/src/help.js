/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { withFilters } = wp.components;

export const HelpTab = () => {
	return (
		<div className="thebase-desk-help-inner">
			<h2>{ __( 'Welcome to basetheme!', 'basetheme' ) }</h2>
			<p>{ __( 'You are going to love working with this theme! View the video below to get started with our video tutorials or click the view knowledge base button below to see all the documentation.', 'basetheme' ) }</p>
			<div className="video-container">
				<a href="https://www.youtube.com/watch?v=GqEecMF7WtE"><img width="1280" height="720" src={ thebaseDashboardParams.videoImage } alt={ __( 'basetheme Theme Getting Started Tutorial - 10 Minute Quick Start Guide', 'basetheme' ) } /></a>
			</div>
			<a href="https://basetheme.net/learn-thebase" className="thebase-desk-button" target="_blank">{ __( 'Video Tutorials', 'basetheme' ) }</a><a href="https://basetheme.net/knowledge-base/" className="thebase-desk-button thebase-desk-button-second" target="_blank">{ __( 'View Knowledge Base', 'basetheme' ) }</a>
		</div>
	);
};

export default withFilters( 'thebase_theme_help' )( HelpTab );