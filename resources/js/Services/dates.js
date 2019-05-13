export {getMounths, getYears};

function getYears() {
    const year = new Date().getFullYear();
    return [year - 1, year, year + 1]
}

function getMounths() {
    return ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']
}
