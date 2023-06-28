import SelectComponent from './select-component.js';

export const SelectControl = wp.customize.TheBaseControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(
				<SelectComponent control={control}/>,
				control.container[0]
		);
	}
} );
