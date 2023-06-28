import RangeComponent from './range-component.js';

export const RangeControl = wp.customize.TheBaseControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(
				<RangeComponent control={control}/>,
				control.container[0]
		);
	}
} );
