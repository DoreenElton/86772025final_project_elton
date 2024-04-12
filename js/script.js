// When the search form is submitted
document.querySelector('form').addEventListener('submit', function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the search query from the form
  const searchQuery = document.querySelector('input[name="search_query"]').value;

  // Send an AJAX request to the search_results_action.php file
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `../action/search_results_action.php?search_query=${searchQuery}`, true);
  xhr.onload = function() {
      // If the request was successful
      if (xhr.status === 200) {
          // Get the search results container
          const searchResultsContainer = document.querySelector('.search-results');

          // Update the search results container with the new results
          searchResultsContainer.innerHTML = xhr.responseText;
      }
  };
  xhr.send();
});