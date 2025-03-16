let books = [];

// Use absolute paths assuming your project folder is "LibraryManagement"
fetch('/LibraryManagement/data/books.json')
    .then(response => {
        if (!response.ok) {
            console.error("HTTP error:", response.status);
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        books = data;
        console.log("Loaded books:", books);
        document.getElementById('searchButton').disabled = false;
    })
    .catch(error => console.error('Error loading books:', error));

// Function to display books in the search results
function displayBooks(booksToDisplay) {
    const resultContainer = document.getElementById('searchResult');
    resultContainer.innerHTML = '';
    booksToDisplay.forEach(book => {
        resultContainer.innerHTML += `
            <div class="book-card">
                <h3><a href="${book.link}" target="_blank">${book.title}</a></h3>
                <p><strong>Author:</strong> ${book.author}</p>
                <p>${book.description}</p>
                <a href="${book.link}" target="_blank" class="book-link">Read More</a>
            </div>
        `;
    });
}

// Search Function: Check session before performing the search
document.getElementById('searchButton').addEventListener('click', () => {
    // Use absolute path for session check
    fetch('/LibraryManagement/pages/check-session.php')
        .then(response => response.text())
        .then(status => {
            if (status.trim() === 'unauthorized') {
                alert('Please login to search books.');
                window.location.href = '/LibraryManagement/pages/login.php';
            } else {
                performSearch();
            }
        })
        .catch(error => {
            console.error('Error checking session:', error);
            alert('Error checking session. Please try again.');
        });
});

// Perform the search using the query from searchInput
function performSearch() {
    if (books.length === 0) {
        alert("Book data is still loading. Please try again in a moment.");
        return;
    }
    const query = document.getElementById('searchInput').value.toLowerCase().trim();
    console.log("Search query:", query);
    const filteredBooks = books.filter(book =>
        book.title.toLowerCase().includes(query) ||
        book.author.toLowerCase().includes(query)
    );
    console.log("Filtered Books:", filteredBooks);
    if (filteredBooks.length > 0) {
        displayBooks(filteredBooks);
    } else {
        document.getElementById('searchResult').innerHTML = `<p>No books found for "${query}".</p>`;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const flashMessage = document.getElementById('flashMessage');
    if (flashMessage) {
        // Auto-hide after 3 seconds
        setTimeout(() => {
            flashMessage.style.opacity = '0';
            // Remove from DOM after fade-out
            setTimeout(() => {
                flashMessage.remove();
            }, 500);
        }, 3000);
    }
});
