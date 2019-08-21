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

    select.select2({});
    dataClans.map((nameClan) => {
        const newOp = new Option(nameClan,nameClan,false,false);
        select.append(newOp);
    });

    select.on('change', function (e) {
        let clanId;
        for(let i = 0; i < dataClans.length; i++){
            if(dataClans[i] === this.value) {
                clanId = i + 1;
            }

        }
        $('#slider').slick('slickGoTo',clanId);
    });

});