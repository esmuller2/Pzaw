const form = document.getElementById('commentForm');
const commentInput = document.getElementById('commentInput');
const commentsList = document.getElementById('commentsList');
 

fetch('/comments')
    .then(response => response.json())
    .then(comments => {
        comments.forEach(comment => addCommentToList(comment));
    });
 

form.addEventListener('submit', function(e) {
    e.preventDefault();
    const comment = commentInput.value;
 
    if (comment) {
        fetch('/comments', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ comment })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                addCommentToList(comment);
                commentInput.value = '';
            } else {
                alert('Error submitting comment');
            }
        });
    }
});
 

function addCommentToList(comment) {
    const li = document.createElement('li');
    li.textContent = comment;
    commentsList.appendChild(li);
}  