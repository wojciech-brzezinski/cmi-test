import { CreateCommentElement } from "../components/comments/create-comment-element";
import { CommentsAPI } from "../components/comments/api";

(async function() {
    const section = document.querySelector("[data-section-last-comments]")

    const comments = await CommentsAPI.findMostRecent();

    for (let comment of comments) {
        section.appendChild(
            CreateCommentElement(comment)
        );
    }
})();