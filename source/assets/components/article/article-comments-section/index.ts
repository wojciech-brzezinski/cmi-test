export class Comment {
    
}

export function CreateCommentElement(data: any): Element {
    const dummy = document.createElement("div");
    
    dummy.innerHTML = `
        <div style=" margin: 10px 0;">
            <small>[${data.created_at}]</small>
            <b>${data.text_value}</b>
        </div>
    `;
    
    return dummy.firstElementChild;
}


