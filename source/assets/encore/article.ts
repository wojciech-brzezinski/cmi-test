import { CreateCommentElement } from "../components/comments/create-comment-element";
import { CommentsAPI } from "../components/comments/api";

(async function() {
    const section: HTMLElement = document.querySelector("[data-section-comments]");

    const articleID = section.getAttribute("data-section-comments");
    
    const comments = await CommentsAPI.findForArticleID(articleID);

    for (let comment of comments) {
        section.appendChild(
            CreateCommentElement(comment)
        );
    }
})();
