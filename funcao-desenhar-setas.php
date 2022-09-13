//SETAS DE SLIDERS
function desenharSetas(){
return <<<HTML
	<div class="setas">
		<div class="seta seta-anterior">
			<svg width="23" height="36" viewBox="0 0 23 36" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M21.875 35.1875L1.25 18L21.875 0.8125" stroke="#ACACAC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
		<div class="seta seta-proximo">
			<svg width="23" height="36" viewBox="0 0 23 36" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1.125 35.1875L21.75 18L1.125 0.8125" stroke="#C8C8C8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
	</div>
HTML;
}