import { Item } from '/asset/todo/item.js';

export class List
{
	isProgress;
	loading;
	itemListContainer;
	container;
	items;

	constructor({ container })
	{
		this.container = container;
		this.items = [];

		this.itemListContainer = document.createElement('div');
		this.itemListContainer.classList.add('calendar-items');

		this.loading = document.createElement('div');
		this.loading.classList.add('hidden');
		this.loading.innerText = 'Loading...';

		this.container.append(this.loading);

		this.container.append(this.itemListContainer);

		this.isProgress = false;
	}

	render()
	{
		this.load().then(({ items }) => {
			if (Array.isArray(items))
			{
				items.forEach((itemData) => {
					this.items.push(this.createItem(itemData));
				});
			}

			this.renderItems();
		}).catch((result) => {
			console.error('Error trying to load items: ' + result);
		});

		this.container.append(this.renderActions());
	}

	createItem(itemData)
	{
		itemData.deleteButtonHandler = this.handleDeleteButtonClick.bind(this);
		itemData.editButtonHandler = this.handleEditButtonClick.bind(this);
		return new Item(itemData);
	}

	handleDeleteButtonClick(item)
	{
		console.log(this.items);
		const index = this.items.indexOf(item);
		if (index > -1)
		{
			this.items.splice(index, 1);
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying to delete item');
			});
		}
	}

	handleEditButtonClick(item)
	{
		const index = this.items.indexOf(item);
		const button = event.target;
		const containerChild = button.parentNode;
		const container = containerChild.parentNode;
		if (button.textContent === 'Edit')
		{
			const itemTitle = container.firstElementChild;
			const input = document.createElement('input');
			container.insertBefore(input, itemTitle);
			container.removeChild(itemTitle);
			button.textContent = 'Save';
		}
		else if (button.textContent === 'Save')
		{
			const input = container.firstElementChild;
			const itemTitle = document.createElement('div');
			itemTitle.className = 'item-title';
			itemTitle.textContent = input.value;
			container.insertBefore(itemTitle, input);
			container.removeChild(input);
			button.textContent = 'Edit';
			this.items = this.changeArray(index, input.value);
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying to edit item');
			});
		}
	}

	changeArray(id, title)
	{
		return this.items.map(items => {
			if (this.items.indexOf(items) === id)
			{
				return (this.createItem({ title: title }));
			}
			return items;
		});
	}

	renderItems()
	{
		this.itemListContainer.innerHTML = '';

		this.items.forEach((item) => {
			this.itemListContainer.append(item.render());
		});
	}

	renderActions()
	{
		const actionsContainer = document.createElement('div');
		const addContainer = document.createElement('div');
		const addInput = document.createElement('input');
		addInput.classList.add('calendar-new-item-title');
		const addButton = document.createElement('button');
		addButton.innerText = 'Add';
		addButton.addEventListener('click', this.handleAddButtonClick.bind(this));

		addContainer.append(addInput);
		addContainer.append(addButton);
		actionsContainer.append(addContainer);

		return actionsContainer;
	}

	handleAddButtonClick()
	{
		const addInput = this.container.querySelector('[class="calendar-new-item-title"]');
		if (addInput)
		{
			if (addInput.value.length === 0)
			{
				return;
			}
			this.items.push(this.createItem({ title: addInput.value }));
			addInput.value = '';

			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying save items: ' + error);
			});
		}
	}

	load()
	{
		return new Promise((resolve, reject) => {
			if (this.isProgress)
			{
				reject('Another action in progress');
				return;
			}
			this.startProgress();
			return fetch(
				'/ajax.php?action=load',
				{
					method: 'POST',
				},
			).then((response) => {
				return response.json();
			}).then((result) => {
				if (result.error)
				{
					reject(result.error);
					return;
				}

				resolve(result);
			}).catch((result) => {
				reject(result);
			}).finally(() => {
				this.stopProgress();
			});
		});
	}

	save()
	{
		console.log(this);
		return new Promise((resolve, reject) => {
			if (this.isProgress)
			{
				reject('Another action in progress');
				return;
			}
			this.startProgress();
			const data = {
				items: [],
			};
			this.items.forEach((item) => {
				data.items.push(item.getData());
			});

			return fetch(
				'/ajax.php?action=save',
				{
					method: 'POST',
					headers: {
						'Content-Type': 'application/json;charset=utf-8',
					},
					body: JSON.stringify(data),
				},
			).then((response) => {
				return response.json();
			}).then((result) => {
				if (result.error)
				{
					reject(result.error);
					return;
				}

				resolve(result);
			}).catch((result) => {
				reject(result);
			}).finally(() => {
				this.stopProgress();
			});
		});
	}

	startProgress()
	{
		this.loading.classList.remove('hidden');
		this.isProgress = true;
	}

	stopProgress()
	{
		this.loading.classList.add('hidden');
		this.isProgress = false;
	}
}
