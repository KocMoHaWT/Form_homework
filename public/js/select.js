const dataClans = [
    'Arryn of the Eyrie',
    'Baratheon of Storms End',
    'Greyjoy of Pyke',
    'Lannister of Casterly Rock',
    'Martell of Dorn',
    'Stark of Winterfell',
    'Targaryen of Kings Landing',
    'Tully of WaterLand',
    'Tyrell of Highgarden'
];


$(document).ready(() => {
    const select = $('#selectClans');
    let counter  = 1;
    select.select2({});
    dataClans.map((nameClan) => {
        const newOp = new Option(nameClan,dataClans[counter++],false,false);
        select.append(newOp);
    });
    select.on('select2:select', function () {
        $('#slider').slick('slickGoTo',+this.value);
    });

});