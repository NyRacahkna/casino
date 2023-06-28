/**
 * Internal dependencies
 */
import HelpTab from './help';
import ChangelogTab from './changelog';
import ProSettings from './pro-extension';
import RecommendedTab from './recomended';
import StarterTab from './starter';
import Sidebar from './sidebar';
import CustomizerLinks from './customizer';
import Notices from './notices';

/**
 * WordPress dependencies
 */
const { __, sprintf } = wp.i18n;
const { registerCoreBlocks } = wp.blockLibrary;
const { hasFilter } = wp.hooks;
const { Fragment, Component, RawHTML, render } = wp.element;
const { TabPanel, Panel, PanelBody, PanelRow, Button } = wp.components;

class TheBaseDashboard extends Component {
	render() {
		const tabs = [
			{
				name: 'dashboard0',
				title: __( 'Dashboard', 'basetheme' ),
				className: 'thebase-dash-tab',
			},
			// {
			// 	name: 'help',
			// 	title: __( 'Getting Started', 'basetheme' ),
			// 	className: 'thebase-help-tab',
			// },
			// {
			// 	name: 'changelog',
			// 	title: __( 'Changelog', 'basetheme' ),
			// 	className: 'thebase-changelog-tab',
			// },
			// {
			// 	name: 'recommended',
			// 	title: __( 'Recommended Plugins', 'basetheme' ),
			// 	className: 'thebase-recommended-tab',
			// },
			// {
			// 	name: 'starter',
			// 	title: __( 'Starter Templates', 'basetheme' ),
			// 	className: 'thebase-starter-tab',
			// },
		];

		const TheBaseDashTabPanel = () => (
			<TabPanel className="thebase-dashboard-tab-panel"
				activeClass="active-tab"
				tabs={ tabs }>
				{
					( tab ) => {
						switch ( tab.name ) {
							case 'dashboard':
								return (
									<Panel className="dashboard-section tab-section">
										<PanelBody
											opened={ true }
										>
											<div className="dashboard-modules-wrapper">
												<div className="dashboard-customizer-settings">
													<CustomizerLinks />
												</div>
												<div className="dashboard-pro-settings">
													<ProSettings />
												</div>
											</div>
										</PanelBody>
									</Panel>
								);

							// case 'help':
							// 	return (
							// 		<Panel className="help-section tab-section">
							// 			<PanelBody
							// 				opened={ true }
							// 			>
							// 				<HelpTab />
							// 			</PanelBody>
							// 		</Panel>
							// 	);
							// case 'changelog':
							// 	return (
							// 		<Panel className="changelog-section tab-section">
							// 			<PanelBody
							// 				opened={ true }
							// 			>
							// 				<ChangelogTab />
							// 			</PanelBody>
							// 		</Panel>
							// 	);

							// case 'recommended':
							// 	return (
							// 		<Panel className="recommended-section tab-section">
							// 			<PanelBody
							// 				opened={ true }
							// 			>
							// 				<RecommendedTab />
							// 			</PanelBody>
							// 		</Panel>
							// 	);

							// case 'starter':
							// 	return (
							// 		<Panel className="starter-section tab-section">
							// 			<PanelBody
							// 				opened={ true }
							// 			>
							// 				<StarterTab />
							// 			</PanelBody>
							// 		</Panel>
							// 	);
						}
					}
				}
			</TabPanel>
		);

		const MainPanel = () => (
			<div className="tab-panel">
				<TheBaseDashTabPanel />
			</div>
		);

		return (
			<Fragment>
				<MainPanel />
				<Notices />
			</Fragment>
		);
	}
}

wp.domReady( () => {
	render(
		<TheBaseDashboard />,
		document.querySelector( '.thebase_theme_dashboard_main' )
	);
} );
