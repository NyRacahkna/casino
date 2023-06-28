/* jshint esversion: 6 */
import PropTypes from 'prop-types';
import classnames from 'classnames';
import ResponsiveControl from '../common/responsive.js';
import Icons from '../common/icons.js';
import { ReactSortable } from "react-sortablejs";
import uniqueId from 'lodash/uniqueId';

import ItemComponent from './item-component';

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Popover, Button, SelectControl } = wp.components;

const { Component, Fragment } = wp.element;
class SocialComponent extends Component {
	constructor() {
		super( ...arguments );
		this.updateValues = this.updateValues.bind( this );
		this.onDragEnd = this.onDragEnd.bind( this );
		this.onDragStart = this.onDragStart.bind( this );
		this.onDragStop = this.onDragStop.bind( this );
		this.removeItem = this.removeItem.bind( this );
		this.saveArrayUpdate = this.saveArrayUpdate.bind( this );
		this.toggleEnableItem = this.toggleEnableItem.bind( this );
		this.onChangeIcon = this.onChangeIcon.bind( this );
		this.onChangeLabel = this.onChangeLabel.bind( this );
		this.onChangeURL = this.onChangeURL.bind( this );
		this.onChangeAttachment = this.onChangeAttachment.bind( this );
		this.onChangeWidth = this.onChangeWidth.bind( this );
		this.onChangeSVG = this.onChangeSVG.bind( this );
		this.onChangeSource = this.onChangeSource.bind( this );
		this.addItem = this.addItem.bind( this );
		let value = this.props.control.setting.get();
		let baseDefault = {
			'items': [
				{
					'id': 'facebook',
					'enabled': true,
					'source': 'icon',
					'url': '',
					'imageid': '',
					'width': 24,
					'icon': 'facebook',
					'label': 'Facebook',
					'svg': '',
				},
				{
					'id': 'twitter',
					'enabled': true,
					'source': 'icon',
					'url': '',
					'imageid': '',
					'width': 24,
					'icon': 'twitter',
					'label': 'Twitter',
					'svg': '',
				}
			],
		};
		this.defaultValue = this.props.control.params.default ? {
			...baseDefault,
			...this.props.control.params.default
		} : baseDefault;
		value = value ? {
			...this.defaultValue,
			...value
		} : this.defaultValue;
		let defaultParams = {
			'group' : 'social_item_group',
			'options': [
				{ value: 'facebook', label: __( 'Facebook', 'basetheme' ) },
				{ value: 'twitter', label: __( 'Twitter', 'basetheme' ) },
				{ value: 'instagram', label: __( 'Instagram', 'basetheme' ) },
				{ value: 'youtube', label: __( 'YouTube', 'basetheme' ) },
				{ value: 'facebook_group', label: __( 'Facebook Group', 'basetheme' ) },
				{ value: 'vimeo', label: __( 'Vimeo', 'basetheme' ) },
				{ value: 'pinterest', label: __( 'Pinterest', 'basetheme' ) },
				{ value: 'linkedin', label: __( 'Linkedin', 'basetheme' ) },
				{ value: 'medium', label: __( 'Medium', 'basetheme' ) },
				{ value: 'wordpress', label: __( 'WordPress', 'basetheme' ) },
				{ value: 'reddit', label: __( 'Reddit', 'basetheme' ) },
				{ value: 'patreon', label: __( 'Patreon', 'basetheme' ) },
				{ value: 'github', label: __( 'GitHub', 'basetheme' ) },
				{ value: 'dribbble', label: __( 'Dribbble', 'basetheme' ) },
				{ value: 'behance', label: __( 'Behance', 'basetheme' ) },
				{ value: 'vk', label: __( 'VK', 'basetheme' ) },
				{ value: 'xing', label: __( 'Xing', 'basetheme' ) },
				{ value: 'rss', label: __( 'RSS', 'basetheme' ) },
				{ value: 'email', label: __( 'Email', 'basetheme' ) },
				{ value: 'phone', label: __( 'Phone', 'basetheme' ) },
				{ value: 'whatsapp', label: __( 'WhatsApp', 'basetheme' ) },
				{ value: 'google_reviews', label: __( 'Google Reviews', 'basetheme' ) },
				{ value: 'telegram', label: __( 'Telegram', 'basetheme' ) },
				{ value: 'yelp', label: __( 'Yelp', 'basetheme' ) },
				{ value: 'trip_advisor', label: __( 'Trip Advisor', 'basetheme' ) },
				{ value: 'imdb', label: __( 'IMDB', 'basetheme' ) },
				{ value: 'soundcloud', label: __( 'SoundCloud', 'basetheme' ) },
				{ value: 'tumblr', label: __( 'Tumblr', 'basetheme' ) },
				{ value: 'discord', label: __( 'Discord', 'basetheme' ) },
				{ value: 'tiktok', label: __( 'TikTok', 'basetheme' ) },
				{ value: 'spotify', label: __( 'Spotify', 'basetheme' ) },
				{ value: 'apple_podcasts', label: __( 'Apple Podcast', 'basetheme' ) },
				{ value: 'flickr', label: __( 'Flickr', 'basetheme' ) },
				{ value: '500px', label: __( '500PX', 'basetheme' ) },
				{ value: 'bandcamp', label: __( 'Bandcamp', 'basetheme' ) },
				{ value: 'anchor', label: __( 'Anchor', 'basetheme' ) },
				{ value: 'custom1', label: __( 'Custom 1', 'basetheme' ) },
				{ value: 'custom2', label: __( 'Custom 2', 'basetheme' ) },
				{ value: 'custom3', label: __( 'Custom 3', 'basetheme' ) },
			],
		};
		this.controlParams = this.props.control.params.input_attrs ? {
			...defaultParams,
			...this.props.control.params.input_attrs,
		} : defaultParams;
		let availableSocialOptions = [];
		this.controlParams.options.map( ( option ) => {
			if ( ! value.items.some( obj => obj.id === option.value ) ) {
				availableSocialOptions.push( option );
			}
		} );
		this.state = {
			value: value,
			isVisible: false,
			control: ( undefined !== availableSocialOptions[0] && undefined !== availableSocialOptions[0].value ? availableSocialOptions[0].value : '' ),
		};
	}
	onDragStart() {
		var dropzones = document.querySelectorAll( '.thebase-builder-area' );
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.add( 'thebase-dragging-dropzones' );
		}
	}
	onDragStop() {
		var dropzones = document.querySelectorAll( '.thebase-builder-area' );
		var i;
		for (i = 0; i < dropzones.length; ++i) {
			dropzones[i].classList.remove( 'thebase-dragging-dropzones' );
		}
	}
	saveArrayUpdate( value, index ) {
		let updateState = this.state.value;
		let items = updateState.items;

		const newItems = items.map( ( item, thisIndex ) => {
			if ( index === thisIndex ) {
				item = { ...item, ...value };
			}

			return item;
		} );
		updateState.items = newItems;
		this.setState( { value: updateState } );
		this.updateValues( updateState );
	}
	toggleEnableItem( value, itemIndex ) {
		this.saveArrayUpdate( { enabled: value }, itemIndex );
	}
	onChangeLabel( value, itemIndex ) {
		this.saveArrayUpdate( { label: value }, itemIndex );
	}
	onChangeIcon( value, itemIndex ) {
		this.saveArrayUpdate( { icon: value }, itemIndex );
	}
	onChangeURL( value, itemIndex ) {
		this.saveArrayUpdate( { url: value }, itemIndex );
	}
	onChangeAttachment( value, itemIndex ) {
		this.saveArrayUpdate( { imageid: value }, itemIndex );
	}
	onChangeWidth( value, itemIndex ) {
		this.saveArrayUpdate( { width: value }, itemIndex );
	}
	onChangeSVG( value, itemIndex ) {
		this.saveArrayUpdate( { svg: value }, itemIndex );
	}
	onChangeSource( value, itemIndex ) {
		this.saveArrayUpdate( { source: value }, itemIndex );
	}
	removeItem( itemIndex ) {
		let updateState = this.state.value;
		let update = updateState.items;
		let updateItems = [];
		{ update.length > 0 && (
			update.map( ( old, index ) => {
				if ( itemIndex !== index ) {
					updateItems.push( old );
				}
			} )
		) };
		updateState.items = updateItems;
		this.setState( { value: updateState } );
		this.updateValues( updateState );
	}
	addItem() {
		const itemControl = this.state.control;
		this.setState( { isVisible: false } );
		if ( itemControl ) {
			let updateState = this.state.value;
			let update = updateState.items;
			const itemLabel = this.controlParams.options.filter(function(o){return o.value === itemControl;} );
			let newItem = {
				'id': itemControl,
				'enabled': true,
				'source': 'icon',
				'url': '',
				'imageid': '',
				'width': 24,
				'icon': itemControl,
				'label': itemLabel[0].label,
				'svg': '',
			};
			update.push( newItem );
			updateState.items = update;
			let availableSocialOptions = [];
			this.controlParams.options.map( ( option ) => {
				if ( ! update.some( obj => obj.id === option.value ) ) {
					availableSocialOptions.push( option );
				}
			} );
			this.setState( { control: ( undefined !== availableSocialOptions[0] && undefined !== availableSocialOptions[0].value ? availableSocialOptions[0].value : '' ) } );
			this.setState( { value: updateState } );
			this.updateValues( updateState );
		}
	}
	onDragEnd( items ) {
		let updateState = this.state.value;
		let update = updateState.items;
		let updateItems = [];
		{ items.length > 0 && (
			items.map( ( item ) => {
				update.filter( obj => {
					if ( obj.id === item.id ) {
						updateItems.push( obj );
					}
				} )
			} )
		) };
		if ( ! this.arraysEqual( update, updateItems ) ) {
			update.items = updateItems;
			updateState.items = updateItems;
			this.setState( { value: updateState } );
			this.updateValues( updateState );
		}
	}
	arraysEqual( a, b ) {
		if (a === b) return true;
		if (a == null || b == null) return false;
		if (a.length != b.length) return false;		
		for (var i = 0; i < a.length; ++i) {
			if (a[i] !== b[i]) return false;
		}
		return true;
	}
	render() {
		const currentList = ( typeof this.state.value != "undefined" && this.state.value.items != null && this.state.value.items.length != null && this.state.value.items.length > 0 ? this.state.value.items : [] );
		let theItems = [];
		{ currentList.length > 0 && (
			currentList.map( ( item ) => {
				theItems.push(
					{
						id: item.id,
					}
				)
			} )
		) };
		const availableSocialOptions = [];
		this.controlParams.options.map( ( option ) => {
			if ( ! theItems.some( obj => obj.id === option.value ) ) {
				availableSocialOptions.push( option );
			}
		} );
		const toggleClose = () => {
			if ( this.state.isVisible === true ) {
				this.setState( { isVisible: false } );
			}
		};
		return (
			<div className="thebase-control-field thebase-sorter-items">
				<div className="thebase-sorter-row">
					<ReactSortable animation={100} onStart={ () => this.onDragStop() } onEnd={ () => this.onDragStop() } group={ this.controlParams.group } className={ `thebase-sorter-drop thebase-sorter-sortable-panel thebase-sorter-drop-${ this.controlParams.group }` } handle={ '.thebase-sorter-item-panel-header' } list={ theItems } setList={ ( newState ) => this.onDragEnd( newState ) } >
						{ currentList.length > 0 && (
							currentList.map( ( item, index ) => {
								return <ItemComponent removeItem={ ( remove ) => this.removeItem( remove ) } toggleEnabled={ ( enable, itemIndex ) => this.toggleEnableItem( enable, itemIndex ) } onChangeLabel={ ( label, itemIndex ) => this.onChangeLabel( label, itemIndex ) } onChangeSource={ ( source, itemIndex ) => this.onChangeSource( source, itemIndex ) } onChangeWidth={ ( width, itemIndex ) => this.onChangeWidth( width, itemIndex ) } onChangeSVG={ ( svg, itemIndex ) => this.onChangeSVG( svg, itemIndex ) } onChangeURL={ ( url, itemIndex ) => this.onChangeURL( url, itemIndex ) } onChangeAttachment={ ( imageid, itemIndex ) => this.onChangeAttachment( imageid, itemIndex ) } onChangeIcon={ ( icon, itemIndex ) => this.onChangeIcon( icon, itemIndex ) } key={ item.id } index={ index } item={ item } controlParams={ this.controlParams } />;
							} )
						) }
					</ReactSortable>
				</div>
				{ undefined !== availableSocialOptions[0] && undefined !== availableSocialOptions[0].value && (
					<div className="thebase-social-add-area">
						{/* <SelectControl
							value={ this.state.control }
							options={ availableSocialOptions }
							onChange={ value => {
								this.setState( { control: value } );
							} }
						/> */}
						{ this.state.isVisible && (
							<Popover position="top right" className="thebase-popover-color thebase-popover-social" onClose={ toggleClose }>
								<div className="thebase-popover-social-list">
									<ButtonGroup className="thebase-radio-container-control">
										{ availableSocialOptions.map( ( item, index ) => {
											return (
												<Fragment>
													<Button
														isTertiary
														className={ 'social-radio-btn' }
														onClick={ () => {
															this.setState( { control: availableSocialOptions[index].value } );
															this.state.control = availableSocialOptions[index].value;
															this.addItem();
														} }
													>
														{ availableSocialOptions[index].label && (
															availableSocialOptions[index].label
														) }
													</Button>
												</Fragment>
											);
										} ) }
									</ButtonGroup>
								</div>
							</Popover>
						) }
						<Button
							className="thebase-sorter-add-item"
							isPrimary
							onClick={ () => {
								this.setState( { isVisible: true } );
							} }
						>
							{ __( 'Add Social', 'basetheme' ) }
							<Dashicon icon="plus"/>
						</Button>
						{/* <Button
							className="thebase-sorter-add-item"
							isPrimary
							onClick={ () => {
								this.addItem();
							} }
						>
							{ __( 'Add Item', 'basetheme' ) }
							<Dashicon icon="plus"/>
						</Button> */}
					</div>
				) }
			</div>
		);
	}
	updateValues( value ) {
		this.props.control.setting.set( {
			...this.props.control.setting.get(),
			...value,
			flag: !this.props.control.setting.get().flag
		} );
	}
}

SocialComponent.propTypes = {
	control: PropTypes.object.isRequired,
};

export default SocialComponent;
