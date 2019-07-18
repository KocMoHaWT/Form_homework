const SLIDER = [
    'maxresdefault',
    'Arryn_of_the_Eyrie',
    'Baratheon_of_Storms_End',
    'Greyjoy_of_Pyke',
    'Lannister_of_Casterly_Rock',
    'Martell_of_Dorn',
    'Stark_of_Winterfell',
    'Targaryen_of_Kings_Landing',
    'Tully_of_WaterLand',
    'Tyrell_of_Highgarden'
];

$(document).ready(() => {
    const slider  = $('#slider');
    SLIDER.map((image) => {
        const div = '<div></div>';
       slider.append($(div).addClass('slide').html(
            `<div class="slides--card">
                <img src="./images/housesToSlider/${image}.png" alt="${image}">
            </div> `
        ));
    });
    $('.slider').slick({
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        arrows: false
    });
});