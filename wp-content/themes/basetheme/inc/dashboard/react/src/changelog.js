/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { withFilters } = wp.components;
const { TabPanel, Panel, PanelBody } = wp.components;
import ChangelogItem from './changelog-item';

export const ChangelogTab = () => {
	const tabs = [
		{
			name: 'basetheme',
			title: __( 'Changelog', 'basetheme' ),
			className: 'thebase-changelog-tab',
		},
		{
			name: 'pro',
			title: __( 'Pro Changelog', 'basetheme' ),
			className: 'thebase-pro-changelog-tab',
		},
	];
	return (
		<Fragment>
			{ thebaseDashboardParams.changelog && (
				<Fragment>
					{ thebaseDashboardParams.proChangelog && thebaseDashboardParams.proChangelog.length && (
						<TabPanel className="thebase-dashboard-changelog-tab-panel"
							activeClass="active-tab"
							tabs={ tabs }>
							{
								( tab ) => {
									switch ( tab.name ) {
										case 'basetheme':
											return (
												<Panel className="thebase-changelog-section tab-section">
													<PanelBody
														opened={ true }
													>
														{ thebaseDashboardParams.changelog.map( ( item, index ) => {
															return <ChangelogItem
																item={ item }
																index={ item }
															/>;
														} ) }
													</PanelBody>
												</Panel>
											);

										case 'pro':
											return (
												<Panel className="pro-changelog-section tab-section">
													<PanelBody
														opened={ true }
													>
														{ thebaseDashboardParams.proChangelog.map( ( item, index ) => {
															return <ChangelogItem
																item={ item }
																index={ item }
															/>;
														} ) }
													</PanelBody>
												</Panel>
											);
									}
								}
							}
						</TabPanel>
					) }
					{ ( '' == thebaseDashboardParams.proChangelog || ( Array.isArray( thebaseDashboardParams.proChangelog ) && ! thebaseDashboardParams.proChangelog.length ) ) && (
						<Fragment>
							{ thebaseDashboardParams.changelog.map( ( item, index ) => {
								return <ChangelogItem
									item={ item }
									index={ item }
								/>;
							} ) }
						</Fragment>
					) }
				</Fragment>
			) }
		</Fragment>
	);
};

export default withFilters( 'thebase_theme_changelog' )( ChangelogTab );