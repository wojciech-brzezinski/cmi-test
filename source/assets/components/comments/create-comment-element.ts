import { Comment } from "./types";

export function CreateCommentElement(data: Comment): Element
{
    const dummy = document.createElement("div");

    /*
     * I'm putting inline styles because of lack of time at the end, I know I will go to hell for that.
     */
    dummy.innerHTML = `
        <div style="margin: 10px 0;">
            <small>[${data.created_at}]</small>
            <b>${data.text_value}</b>
        </div>
    `;

    return dummy.firstElementChild;
}
