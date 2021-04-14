import $http from "axios";

import { CreateCommentElement } from "../components/article/article-comments-section";

const x: HTMLElement = document.querySelector("[data-section-comments]");

async function loadComments(articleID: string) {
    const response = await $http.get(`/v1/comments?article=${articleID}`);

    return response.data;
}


(async function() {
    const articleID = x.getAttribute("data-section-comments");
    
    const comments = await loadComments(articleID);

    for (let comment of comments) {
        x.appendChild(
            CreateCommentElement(comment)
        );
    }
})();
