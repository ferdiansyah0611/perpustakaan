document.addEventListener("DOMContentLoaded", () => {
  const globalConfig = {
    placeHolder: "Search Data...",
    threshold: 3,
    debounce: 500,
    resultItem: {
      tag: "li",
      class: "autocomplete p-2",
      maxResults: 5,
      element: (item, data) => {
        item.setAttribute("data-parent", "food-item");
      },
      highlight: "text-primary",
      selected: "text-primary auto-active",
    },
  };
  const makeComplete = (selector, endpoint, idField, nameField) => {
    const autocomplete = document.querySelector(selector);
    if (!autocomplete) return;
    const idInput = document.querySelector(`[name="${idField}"]`);
    const config = {
      ...globalConfig,
      selector,
      data: {
        src: async (query) => {
          try {
            let response = await fetch(`/${endpoint}/search?query=` + query, {
              credentials: "include",
            });
            response = await response.json();
            return response;
          } catch (e) {
            return e;
          }
        },
        keys: [nameField],
      },
    };

    const autoCompleteJS = new autoComplete(config);

    autocomplete.addEventListener("selection", function (event) {
      let value = event.detail.selection.value;
      autocomplete.value = value[nameField];
      idInput.value = value.id;
    });
  };
  makeComplete("#users_id", "users", "user_id", "name");
  makeComplete("#books_id", "books", "book_id", "title");
});
