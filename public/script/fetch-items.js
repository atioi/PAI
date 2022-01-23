const itemsContainer = document.getElementById('items-container');

const waitingBlock = document.createElement('div');
const container = document.createElement('div');
container.append(document.createElement('div'))
waitingBlock.append(container);
itemsContainer.append(waitingBlock);

function waiting() {
    itemsContainer.setAttribute('style', 'flex-direction: column;');
    waitingBlock.className = 'Waiting-Block';
}

function stopWaiting() {
    waitingBlock.className = '';
    itemsContainer.setAttribute('style', 'flex-direction: row;');
}



function html(items) {
    return items.map(item => {
        return new Item(
            item['title'],
            item['description'],
            item['localization'],
            item['photos']
        );
    });
}

function display(items) {
    items.forEach(item => itemsContainer.append(item));
}

// waiting()

async function fetchItems() {

    waiting();
    const response = await fetch('/items');
    const json = await response.json();
    const items = html(json)
    stopWaiting();
    display(items);
    return items;
}

const result = fetchItems();
