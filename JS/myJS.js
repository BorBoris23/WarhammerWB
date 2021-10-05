function drawMap(response)
{
    const Width = response.map.latitude;
    const Height = response.map.longitude;
    let mapContent = response.map.mapContent;
    for (let x = 0; x < Height; x ++) {
        for (let y = 0; y < Width; y++) {
            let coordinateX = x * (CellHeight * CellWidth);
            let coordinateY = y * (CellHeight * CellWidth);
            if(mapContent[x]) {
                if (mapContent[x][y]) {
                    let unitRace = mapContent[x][y].unitType;
                    let objectType = mapContent[x][y].impassableObjectType;
                    if(unitRace) {
                        paintCell(coordinateX, coordinateY, determinationColorsObjectByType(unitRace.race), CellHeight, CellWidth);
                    }
                    if(objectType) {
                        paintCell(coordinateX, coordinateY, determinationColorsObjectByType(objectType.type), CellHeight, CellWidth);
                    }
                } else {
                    paintCell(coordinateX, coordinateY, '#ffffff', CellHeight, CellWidth);
                }
            } else {
                paintCell(coordinateX, coordinateY, '#ffffff', CellHeight, CellWidth);
            }
        }
    }
    drawGridOnMap(Height, Width, CellHeight, CellWidth);
}

function paintCell(x, y, color, CellHeight, CellWidth)
{
    let canvas = document.getElementById("myCanvas");
    let ctx = canvas.getContext('2d');

    let width = CellHeight*CellWidth;
    let height = CellHeight*CellWidth;

    ctx.fillStyle = color;
    ctx.fillRect(x, y, width, height)
}

function drawGridOnMap(Height, Width, CellHeight, CellWidth)
{
    let canvas = document.getElementById("myCanvas");
    let ctx = canvas.getContext('2d');

    let cell = CellHeight*CellWidth;

    let canvasX = Height * cell;
    let canvasY = Width * cell;

    for (let x = 0; x < canvasX; x += cell) {
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvasY);
    }

    for (let y = 0; y < canvasY; y += cell) {
        ctx.moveTo(0, y);
        ctx.lineTo(canvasX, y);
    }

    ctx.strokeStyle = "#888";
    ctx.stroke();
}

function determinationColorsObjectByType(objectType)
{
    if(objectType === 'Human') {
        return HumanColor;
    }
    if(objectType === 'Orc') {
        return OrcColor;
    }
    if(objectType === 'wood') {
        return WoodColor;
    }
    if(objectType === 'rock') {
        return RockColor;
    }
}

function showMessage(response)
{
    return response.message;
}





