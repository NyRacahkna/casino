import MeasureComponent from './measure-component';

export const MeasureControl = wp.customize.TheBaseControl.extend( {
	renderContent: function renderContent() {
		let control = this;
		ReactDOM.render(
				<MeasureComponent control={control}/>,
				control.container[0]
		);
	}
} );
